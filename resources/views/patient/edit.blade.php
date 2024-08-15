@extends('layouts.app')

@section('content')

<section class="page-section" id="contact">
    <div class="container">

        <h2 class="masthead page-section-heading text-center text-uppercase text-secondary mb-0" style="padding-top: 5rem;">Edytujesz pacjenta {{ $clinic->name }}</h2>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <form action="{{ route('patient.update', ['id' => $clinic->id]) }}" method="POST" id="contactForm" name="sentMessage" >
                    
                    @csrf
                    @method('PUT')

                    <div class="form-floating mb-3">
                        <input value="{{ $clinic->name }}" class="form-control" id="name" name="name" type="text" placeholder="Imię i Nazwisko" maxlength="30" required />
                        <label for="number">Imię i Nazwisko</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input value="{{ $clinic->date }}" class="form-control" id="date" name="date" type="text" placeholder="Data wizyty" pattern="\d{4}-\d{2}-\d{2}" maxlength="10" required />
                        <label for="date">Data wizyty</label>
                        <div class="invalid-feedback">
                            Wprowadź poprawną datę wizyty.
                        </div>
                    </div>

                    <script>
                    $(function() {
                        $("#date").datepicker({
                            dateFormat: 'yy-mm-dd',
                            minDate: 0, 
                            onSelect: function(dateText, inst) {
                                $(this).val(dateText);
                            }
                        });
                    });
                    </script>

                    <div class="form-floating mb-3">
                        <input value="{{ $clinic->phone }}" class="form-control" id="phone" name="phone" type="tel" placeholder="Numer telefonu" minlength="9" maxlength="9" pattern="\d{9}" required />
                        <label for="phone">Numer telefonu</label>
                        <div class="invalid-feedback">
                            Wprowadź poprawny numer telefonu.
                        </div>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input value="{{ $clinic->mail }}" class="form-control" id="mail" name="mail" type="email" placeholder="Adres Email" maxlength="30"/>
                        <label for="mail">Adres email</label>
                        <div class="invalid-feedback">
                            Wprowadź poprawny adres email.
                        </div>
                    </div>

                    <div class="form-floating mb-3 position-relative">
                        <input class="form-control" id="doctor-input" name="doctor" type="text" placeholder="Wybór lekarza" value="{{ $clinic->doctor }}" required />
                        <label for="doctor-input">Wybór lekarza</label>
                        <select name="doctor" id="doctor-select" class="form-select position-absolute top-0 start-0 w-100 h-100 opacity-0" onchange="updateInput()" required>
                            <option disabled></option>
                            @foreach($users as $user)
                                <option value="{{ $user->name }}" {{ $clinic->doctor == $user->name ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <script>
                        function updateInput() {
                            var select = document.getElementById('doctor-select');
                            var input = document.getElementById('doctor-input');
                            input.value = select.options[select.selectedIndex].text;
                        }
                    
                        document.addEventListener('DOMContentLoaded', function() {
                            var select = document.getElementById('doctor-select');
                            if (select.value) {
                                var input = document.getElementById('doctor-input');
                                input.value = select.options[select.selectedIndex].text;
                            }
                        });
                    </script>
                    

                    <div id="success"></div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Wyślij formularz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



@endsection