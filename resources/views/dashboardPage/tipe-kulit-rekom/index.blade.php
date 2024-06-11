@extends('layout.main')

@section('content')
    <div class="container">
        {{--  ALERT  --}}
        <div class="row mt-3">
            <div class="col">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('failed'))
                    <div class="alert alert-danger alert-dismissible fade show text-white" role="alert">
                        {{ session('failed') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        {{--  ALERT  --}}
        {{--  CONTENT  --}}
        <div class="row mt-3 mb-5">
            <div class="col">
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#createModal">
                    <i class="fa-solid fa-magnifying-glass me-2"></i>
                    Cari Tipe Kulit
                </button>

                <div class="card mt-3 col-sm-6 col-md-12 mb-3">
                    <div class="card-body">
                        {{-- tables --}}
                        <table id="myTable" class="table responsive nowrap table-bordered table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tipe Kulit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Normal</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kering</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Berminyak</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Sensitif</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Kombinasi</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{--  CONTENT  --}}

        {{--  MODAL ADD  --}}
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cari Tipe Kulit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="skinTypeForm">
                        <div class="modal-body">
                            <div id="questions">
                                <!-- Questions will be injected here -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary d-none" id="backBtn">Back</button>
                            <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--  MODAL ADD  --}}

    </div>

@section('scripts')
    <script>
        $(document).ready(function() {
            // Simpan ikon di dalam tag HTML
            var prevIcon = '<i class="fa-solid fa-chevron-left"></i>';
            var nextIcon = '<i class="fa-solid fa-chevron-right"></i>';

            // Ganti teks "Previous" dengan ikon saat dokumen pertama kali dimuat
            $('.page-link:contains("Previous")').html(prevIcon);

            // Ganti teks "Next" dengan ikon saat dokumen pertama kali dimuat
            $('.page-link:contains("Next")').html(nextIcon);

            // Tambahkan event handler untuk setiap kali tabel di-redraw
            $('#myTable').on('draw.dt', function() {
                // Ganti teks "Previous" dengan ikon setiap kali tabel di-redraw
                $('.page-link:contains("Previous")').html(prevIcon);

                // Ganti teks "Next" dengan ikon setiap kali tabel di-redraw
                $('.page-link:contains("Next")').html(nextIcon);
            });
        });

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
            let currentQuestion = 0;

            const questionsDiv = document.getElementById('questions');
            const backBtn = document.getElementById('backBtn');
            const nextBtn = document.getElementById('nextBtn');

            function showQuestion(index) {
                questionsDiv.innerHTML = `
                    <div class="mb-3">
                        <label class="form-label fs-5">${questions[index]}</label>
                        <div>
                            <input type="radio" name="question${index}" value="5" required> Ya
                            <input type="radio" name="question${index}" value="0"> Tidak
                        </div>
                    </div>
                `;
                if (index === 0) {
                    backBtn.classList.add('d-none');
                } else {
                    backBtn.classList.remove('d-none');
                }
                if (index === questions.length - 1) {
                    nextBtn.textContent = 'Finish';
                } else {
                    nextBtn.textContent = 'Next';
                }
            }

            nextBtn.addEventListener('click', function() {
                const selectedValue = document.querySelector(
                    `input[name="question${currentQuestion}"]:checked`);
                if (selectedValue) {
                    scores[currentQuestion] = parseInt(selectedValue.value);
                    currentQuestion++;
                    if (currentQuestion < questions.length) {
                        showQuestion(currentQuestion);
                    } else {
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
                        questionsDiv.innerHTML =
                            `<div class="alert alert-info text-white">Tipe Kulit Anda: ${skinType}</div>`;
                        nextBtn.classList.add('d-none');
                        backBtn.classList.add('d-none');
                    }
                } else {
                    alert('Please select an answer.');
                }
            });

            backBtn.addEventListener('click', function() {
                if (currentQuestion > 0) {
                    currentQuestion--;
                    showQuestion(currentQuestion);
                }
            });

            showQuestion(currentQuestion);
        });
    </script>
@endsection
@endsection
