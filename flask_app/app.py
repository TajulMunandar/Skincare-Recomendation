# flask_app/app.py
from flask import Flask, request, jsonify
from flask_cors import CORS
import pandas as pd
import requests
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity

app = Flask(__name__)

CORS(app)

@app.route('/get-data')
def get_data():
    # URL endpoint API Laravel
    laravel_api_url = 'http://127.0.0.1:8000/api/get-data'  # Ganti dengan URL yang benar

    # Mendapatkan data dari Laravel API
    try:
        response = requests.get(laravel_api_url)
        response.raise_for_status()  # Membuat exception jika response status code bukan 200
        skincare_data = pd.DataFrame(response.json())

        # bobot
        brand_weight = 2.0
        skin_issue_weight = 1.5
        skin_type_weight = 1.0
        category_weight = 1.0
        age_weight = 1.5
        price_weight = 2.0

        skincare_data['Features'] = (skincare_data['Id'].astype(str) + ' ' +
                                     (skincare_data['Brand'] + ' ') * brand_weight +
                                     (skincare_data['Masalah_Kulit'] + ' ') * skin_issue_weight +
                                     (skincare_data['Tipe_Kulit'] + ' ') * skin_type_weight +
                                     (skincare_data['Kategori'] + ' ') * category_weight +
                                     (skincare_data['Umur'].astype(str) + ' ') * age_weight +
                                     (skincare_data['Harga'].astype(str) + ' ') * price_weight)

        tfidf_vectorizer = TfidfVectorizer(
            tokenizer=lambda text: text.split(),  # Gunakan tokenizer yang membagi teks berdasarkan spasi
            ngram_range=(1, 2),  # Gunakan unigram dan bigram
            max_df=0.95,  # Hapus kata-kata yang muncul dalam lebih dari 80% dokumen
            min_df=1
        )
        tfidf_matrix = tfidf_vectorizer.fit_transform(skincare_data['Features'])

        return skincare_data, tfidf_vectorizer, tfidf_matrix

    except Exception as e:
        print("Error occurred while fetching or processing data:", e)
        return None, None, None

# Membuat fungsi untuk merekomendasikan skincare berdasarkan input pengguna
def recommend_skincare(user_input, skincare_data, tfidf_vectorizer, tfidf_matrix, num_recommendations=3):
    # Menghitung similarity score antara produk dengan input pengguna
    input_features = tfidf_vectorizer.transform([user_input])
    cosine_similarities = cosine_similarity(input_features, tfidf_matrix).flatten()

    # Mendapatkan indeks produk dengan similarity score tertinggi
    top_indices = cosine_similarities.argsort()[-num_recommendations:][::-1]

    # Mendapatkan rekomendasi produk
    recommended_products = skincare_data.iloc[top_indices]

    return recommended_products

@app.route('/cbf', methods=['POST'])
def cbf_recommendation():
    # Pastikan request adalah POST dan memiliki data form
    if request.method == 'POST' and request.form:
        umur = request.form['umur']
        harga = request.form['harga']
        id_brand = request.form['id_brand']
        id_type_kulit = request.form['id_type_kulit']
        id_masalah_kulit = request.form['id_masalah_kulit']
        id_kategori = request.form['id_kategori']

        # Lakukan validasi input pengguna di sini

        # Mendapatkan data skincare dari Laravel dan membangun matriks TF-IDF
        skincare_data, tfidf_vectorizer, tfidf_matrix = get_data()

        if skincare_data is not None:
            # Gabungkan input pengguna menjadi satu string
            user_input = f"{umur} {harga} {id_brand} {id_type_kulit} {id_masalah_kulit} {id_kategori}"

            # Merekomendasikan produk skincare berdasarkan input pengguna
            recommended_products = recommend_skincare(user_input, skincare_data, tfidf_vectorizer, tfidf_matrix)

            print("Bobot TF-IDF untuk setiap fitur:")
            feature_names = tfidf_vectorizer.get_feature_names_out()
            idf_values = tfidf_vectorizer.idf_

            for feature, idf in zip(feature_names, idf_values):
                print(f"{feature}: {idf}")

            return jsonify(status="success", message="Rekomendasi berhasil ditemukan", data=recommended_products.to_dict()), 200
        else:
            return jsonify(error="Gagal mendapatkan data dari API Laravel"), 500
    else:
        return jsonify(error="Invalid request. Please provide form data."), 400


if __name__ == '__main__':
    app.run(debug=True)
