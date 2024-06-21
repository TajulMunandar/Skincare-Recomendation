@extends('layout.main')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-4">Cari Tipe Kulit</h5>
                <form id="skinTypeForm">
                    <div id="questions" class="mb-4">
                        <!-- Questions will be injected here -->
                    </div>
                    <button type="button" class="btn btn-primary" id="submitBtn">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resultModalLabel">Hasil Tipe Kulit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="result">
                        <!-- Result will be displayed here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const questions = [
                "1. Apakah anda sering mengalami kilap berlebihan di wajah atau mungkin ada daerah yang terasa kering dan kasar?",
                "2. Apakah anda pernah mengalami iritasi atau kemerahan pada kulit setelah menggunakan produk tertentu?",
                "3. Apakah anda mengalami reaksi kulit terhadap perubahan cuaca atau lingkungan?",
                "4. Apakah anda memiliki ketidak nyamanan tertentu pada kulit wajah? seperti rasa terbakar atau gatal?",
                "5. Apakah stektur kulit anda terlihat halus dan merata?",
                "6. Apakah kulit anda mengalami noda minyak di area dahi, hidung, dan dagu(T.zone)?",
                "7. Apakah anda mengalami perubahan hormon selama masa pebertas?"
            ];

            const scores = Array(questions.length).fill(0);

            const questionsDiv = document.getElementById('questions');
            const submitBtn = document.getElementById('submitBtn');
            const resultDiv = document.getElementById('result');
            const resultModal = new bootstrap.Modal(document.getElementById('resultModal'));

            function showQuestions() {
                questionsDiv.innerHTML = questions.map((question, index) => `
                <div class="mb-3">
                    <label class="form-label fs-5">${question}</label>
                    <div>
                        <input type="radio" name="question${index}" value="5" required> Ya
                        <input type="radio" name="question${index}" value="0"> Tidak
                    </div>
                </div>
            `).join('');
            }

            submitBtn.addEventListener('click', function() {
                let allAnswered = true;

                questions.forEach((question, index) => {
                    const selectedValue = document.querySelector(
                        `input[name="question${index}"]:checked`);
                    if (selectedValue) {
                        scores[index] = parseInt(selectedValue.value);
                    } else {
                        allAnswered = false;
                    }
                });

                if (allAnswered) {
                    const totalScore = scores.reduce((a, b) => a + b, 0);
                    let skinType = '';
                    if (totalScore === 0) {
                        skinType = 'Normal';
                    } else if (totalScore <= 10) {
                        skinType = 'Kering';
                    } else if (totalScore <= 20) {
                        skinType = 'Berminyak';
                    } else if (totalScore <= 30) {
                        skinType = 'Sensitif';
                    } else {
                        skinType = 'Kombinasi';
                    }
                    resultDiv.innerHTML =
                        `<div class="alert alert-info text-white">Tipe Kulit Anda: ${skinType}</div>`;
                    resultModal.show();
                } else {
                    alert('Please select an answer for all questions.');
                }
            });

            showQuestions();
        });
    </script>
@endsection
