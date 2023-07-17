@extends('layout.base')
@section('tabTittle')
    Crear Concierto
@endsection


@section('content')
    @auth
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.all.min.js"></script>
        @vite('resources/css/form.css')

        @if (auth()->user()->role === 1)

            <body>
                <img src="{{ asset('img/marker.png') }}" class="marker" width="25" height="6">
                <div class="concertForms">
                    <h2>¡Ingresa un concierto!</h2>
                    <form id="form" action="{{ route('concert') }}" method="POST" novalidate>
                        @csrf
                        @if (session('confirmMessage'))
                            <div class="confirmMsg">
                                <p>{{ session('confirmMessage') }}</p>
                            </div>
                        @endif
                        <div class="concert_name">

                            <label>NOMBRE DEL CONCIERTO</label>

                            <div class="tooltipIzq">
                                <span class="tooltiptext"> Recuerda que el nombre del concierto debe tener como mínimo 5 caracteres
                                    <br>
                                    (˶ᵔ ᵕ ᵔ˶ )
                                </span>
                                <input id="concert_name" name="concert_name" type="text">
                            </div>
                            @error('concert_name')
                                <div class="errorMsg">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror

                        </div>
                        <div class="price">
                            <label>PRECIO</label>

                            <div class="tooltipIzq">
                                <span class="tooltiptext"> Recuerda que el precio del concierto debe ser mayor a $20.000 CLP
                                    <br>
                                    (づ ᴗ _ᴗ)づ♡
                                </span>
                                <input id="price" name="price" type="text">
                            </div>
                            @error('price')
                                <div class="errorMsg">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="stock">
                            <label>STOCK</label>
                            <div class="tooltipIzq">
                                <span class="tooltiptext"> Recuerda que el stock del concierto debe ser igual o superior a 100 y no superior a 400
                                <br>
                                ʚ(｡˃ ᵕ ˂ )ɞ
                                </span>
                                <input id="stock" name="stock" type="text">
                            </div>
                            @error('stock')
                                <div class="errorMsg">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="date">
                            <label>FECHA</label>
                            <div class="tooltipIzq">
                                <span class="tooltiptext"> Recuerda que la fecha del concierto debe ser desde el día de mañana en adelante
                                    <br>
                                    ⸜(｡˃ ᵕ ˂ )⸝♡
                                 </span>
                                <input id="date" name="date" type="date" onkeydown="return false">
                            </div>
                            @error('date')
                                <div class="errorMsg">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                            @if (session('message'))
                                <div class="errorMsg">
                                    <p>{{ session('message') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="tooltip" style="width: 400px">
                            <span class="tooltiptext" style="margin-top: -50px"> ¡Presiona el botón para crear el concierto! </span>
                            <input id="button" type="button" value="CREAR CONCIERTO" class="store">
                        </div>
                    </form>

                </div>

                <script>
                    // Aqui va nuestro script de sweetalert
                    const button = document.getElementById("button");
                    const form = document.getElementById("form");

                    button.addEventListener('click', (e) => {
                        e.preventDefault();
                        Swal.fire({
                            title: '¿Estás seguro que quieres enviar estos datos?',
                            icon: 'warning',
                            position: 'center',
                            backdrop: true,
                            toast: false,
                            showCancelButton: true,
                            confirmButtonColor: '#00c787',
                            cancelButtonColor: '#FF5C77',
                            confirmButtonText: 'ACEPTAR',
                            cancelButtonText: 'CANCELAR',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                            customClass: {
                                container: 'alert',
                                popup: 'popupMessage',
                                confirmButton: 'button',
                                cancelButton: 'button',
                                input: 'input'
                            }
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        })
                    })
                </script>

            </body>
        @endif
        @if (auth()->user()->role === 0)
            <meta http-equiv="refresh" content="0;{{ route('viewHome') }}">
        @endif

        </html>
    @endauth
@endsection
