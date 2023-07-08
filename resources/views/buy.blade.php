
@auth
@if(auth()->user()->role === 0)
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/MelodyLogo.png')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <title>Comprar Entradas</title>

    @vite('resources/css/buy.css')
    @vite('resources/css/base.css')


<body>


    <header class="header">
        <div class="headerLogo">
            <img src="{{asset('img/melodyLogo.png')}}" class="logoImg">
        </div>

        <a href="{{route('viewHome')}}" class="return">
            Volver
        </a>
    </header>


    <form id='form' class="containerCompraGen" action="{{route('concert.buy',['id' => $concert->id])}}" method="POST" novalidate >
        @csrf
        <h1>¡Compra tus entradas!</h1>

        <table class = "concertContainer">
            <td>
                <h2>Nombre del Concierto:</h2>
                <div class="concertInfo" style="text-align: left">{{$concert->concertName }}</div>
                <h2>Fecha:</h2>
                <div class="concertInfo" style="text-align: left">{{ $concert->date }}</div>
                <h2>Valor de entrada:</h2>
                <div class="concertInfo" style="text-align: left">${{ $concert->price }}</div>
                <h2>Cantidad de entradas:</h2>
                <select id='quantity' name="quantity" class="menu2">

                    <option selected value="">--Seleccione las entradas--</option>
                    @for ($i = 1; $i <= $concert->availableStock; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>

                    @endfor

                </select>
            </td>
            <td>
                <img src="{{asset('img/tickethd.png')}}" class="ticketImg" width="190" height="190" >
            </td>

        </table>

        <div class="containerCompra">
            <table>
                <p class="selection">Seleccione su método de pago</p>
            </table>
            <table class="payMethod1">
                <td>
                    <button class="payMethod" id="1" value="1">
                <img src="{{asset('img/efectivo.png')}}" class="pago" width="30" height="30">
                <p>Efectivo</p>
                    </button>
                </td>
                <td>
                    <button class="payMethod" id="2" value="2">
                <img src="{{asset('img/transferencia.png')}}" class="pago" width="30" height="30">
                <p>Transferencia</p>
                    </button>
                </td>
            </table>
            <table class="payMethod2">
                <td>
                <button class="payMethod" id="3" value="3">
                <img src="{{asset('img/tarjetaCredito.png')}}" class="pago" width="30" height="30">
                <p >Tarjeta de Crédito</p>
                </button>
                </td>

                <td>
                <button class="payMethod" id="4" value="4">
                <img src="{{asset('img/tarjetaDebito.png')}}" class="pago" width="30" height="30">
                <p >Tarjeta de Débito</p>
                </button>
                </td>
            </table>
        </div>

        <div class="totalText">
            <p class="totalPrice">TOTAL: $</p>
            <p id="total" class="totalPrice"> 0 </p>
        </div>

        <input id="total-s" name="total" value="0" hidden>
        <input name="reservation_number" value="" hidden>
        <input id="selectedPayMethod" name="payMethod" value="" hidden>


        <input type="button" id = "buttonBuy" class="buttonBuy" value="COMPRAR">

        @error('quantity')
            <p class="errorMsg">{{ $message }}</p>
        @enderror
        @if (session('message'))
            <p class="errorMsg">{{ session('message') }}</p>
        @endif
        @error('payMethod')
            <p class="errorMsg">{{ $message }}</p>
        @enderror
        @error('total')
            <p class="errorMsg">{{ $message }}</p>
        @enderror
        @error('reservation_number')
            <p class="errorMsg">{{ $message }}</p>
        @enderror



    </form>

    <footer class="pageFooter">
        <h3 class="tradeMark">Melody™</h3>
        <p class="copyrigth"> Todos los derechos reservados - 2023. </p>
    </footer>



</body>

<script>
    // Aqui va nuestro script de sweetalert
    const button2 = document.getElementById("buttonBuy");
    const form = document.getElementById("form");

    button2.addEventListener('click', (e) => {
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro que quieres enviar estos datos?',
            icon: 'warning',
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


<script>
    const button = document.getElementById('add-buttom');
    const quantity = document.getElementById('quantity');
    const total = document.getElementById('total');
    const total_Submit = document.getElementById('total-s');
    window.addEventListener('DOMContentLoaded', (e) => {
        e.preventDefault();
        button.disabled = true;
    })
    quantity.addEventListener('click', (e) => {
        e.preventDefault();
        console.log(quantity.value);
        const sell = {{ $concert->price }} * quantity.value;
        total.textContent = sell.toLocaleString(undefined, { useGrouping: true });
        total_Submit.value = sell;
    })
</script>

<script>
    const payMethod1 = document.getElementById('1');
    const payMethod2 = document.getElementById('2');
    const payMethod3 = document.getElementById('3');
    const payMethod4 = document.getElementById('4');
    payMethod1.addEventListener('click', (e) => {
        e.preventDefault();
        selectedPayMethod.value = payMethod1.id;
        console.log(selectedPayMethod.value);
    })
    payMethod2.addEventListener('click', (e) => {
        e.preventDefault();
        selectedPayMethod.value = payMethod2.id;
        console.log(selectedPayMethod.value);
    })
    payMethod3.addEventListener('click', (e) => {
        e.preventDefault();
        selectedPayMethod.value = payMethod3.id;
        console.log(selectedPayMethod.value);
    })
    payMethod4.addEventListener('click', (e) => {
        e.preventDefault();
        selectedPayMethod.value = payMethod4.id;
        console.log(selectedPayMethod.value);

    })


</script>


</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/MelodyLogo.png')}}">
    <title>Inciar sesión - Melody</title>

    @vite('resources/css/home.css')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <img src="{{asset('img/marker.png')}}" class="marker2" width="25" height="6">
    

    <div class="containerCompraGen">
        <h1>¡Compra tus entradas!</h1>
        <table>
            <td>
                <h2>Nombre del Concierto:</h2>
                <p2>Concierto Ejemplo</p2>
                <h2>Fecha:</h2>
                <p2>XX/XX/XX</p2>
                <h2>Valor de entrada:</h2>
                <p2>$XX.XXX</p2>
                <h2>Cantidad de entradas:</h2>
                <select name="menu2">

                <option selected value="">--Seleccione las entradas--</option>
                    <!-- @for ($i = 1; $i <= $concert->stock; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        
                    @endfor -->

                /select>
            </td>
            <td>
                <img src="{{asset('img/tickethd.png')}}" class="pago" width="190" height="190" >
            </td>
   
        </table>
        
        <div class = "container"> </div>
        <div class="containerCompra">
            <table>
                Seleccione su metodo de pago
            </table>
            <table align="center">
                <td>
                    <button class="metodoPago">
                <img src="{{asset('img/efectivo.png')}}" class="pago" width="30" height="30">
                <p>Efectivo</p>
                    </button>
                </td>
                <td>
                    <button class="metodoPago">
                <img src="{{asset('img/transferencia.png')}}" class="pago" width="30" height="30">
                <p>Transferencia</p>
                    </button>
                </td>
            </table>
            <table align="center">
                <td>
                <button class="metodoPago">
                <img src="{{asset('img/tarjetaCredito.png')}}" class="pago" width="30" height="30">
                <p >Tarjeta de Credito</p>
                </button>
                </td>
                <td>
                <button class="metodoPago">
                <img src="{{asset('img/tarjetaDebito.png')}}" class="pago" width="30" height="30">
                <p >Tarjeta de Debito</p>
                </button>
                </td>
            </table>
        </div>
        
            <h3>TOTAL: $XX.XXX</h3>
            <button class="buttonBuy" >COMPRAR</button>

    </div>


</body>
</html>
