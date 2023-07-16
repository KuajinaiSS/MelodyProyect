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
                        <div class="concertName">
                            <div><label>NOMBRE DEL CONCIERTO</label></div>
                            <input data-tooltip-target="tooltip-nombre" data-tooltip-placement="left" id="concertName"
                                name="concertName" type="text">
                            <div id="tooltip-nombre" role="tooltip"
                                class="max-w-xs font-sans absolute z-10 invisible inline-block px-3 py-4 text-sm font-medium text-white transition-opacity duration-300 bg-[#a5decd] rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-black">
                                El nombre del concierto debe contener, como mínimo, 5 caracteres. ⚠️🖊️
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            @error('concertName')
                                <div class="errorMsg">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="price">
                            <div><label>PRECIO</label></div>
                            <input data-tooltip-target="tooltip-precio" data-tooltip-placement="left" id="price"
                                name="price" type="text">
                            <div id="tooltip-precio" role="tooltip"
                                class="max-w-xs font-sans absolute z-10 invisible inline-block px-3 py-4 text-sm font-medium text-white transition-opacity duration-300 bg-[#a5decd] rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-black">
                                El valor de la entrada debe ser igual o superior a $20.000 pesos. 💲💰
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            @error('price')
                                <div class="errorMsg">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="stock">
                            <div><label>STOCK</label></div>
                            <input data-tooltip-target="tooltip-stock" data-tooltip-placement="left" id="stock"
                                name="stock" type="text">
                            <div id="tooltip-stock" role="tooltip"
                                class="max-w-xs font-sans absolute z-10 invisible inline-block px-3 py-4 text-sm font-medium text-white transition-opacity duration-300 bg-[#a5decd] rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-black">
                                La cantidad de entradas debe ser un número entre 100 y 400. 🔢🎟️
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            @error('stock')
                                <div class="errorMsg">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="date">
                            <div><label>FECHA</label></div>
                            <input data-tooltip-target="tooltip-fecha" data-tooltip-placement="left" id="date"
                                name="date" type="date" onkeydown="return false">
                            <div id="tooltip-fecha" role="tooltip"
                                class="max-w-xs font-sans absolute z-10 invisible inline-block px-3 py-4 text-sm font-medium text-white transition-opacity duration-300 bg-[#a5decd] rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-black">
                                La fecha del concierto no puede ser igual al día de hoy. ❌📅
                                <div class="tooltip-arrow" data-popper-arrow></div>
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
                        <input id="button" type="button" value="CREAR CONCIERTO" class="store">
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
