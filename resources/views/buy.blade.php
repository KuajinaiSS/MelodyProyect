
@auth

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/MelodyLogo.png')}}">
    <title>Comprar Entradas</title>

    @vite('resources/css/home.css')
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


    <form id='form' action="{{route('concert.buy', ['id'=> $concert->id])}}" method="POST" novalidate class="containerCompraGen">
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
                <select id='quantity' name="menu2" class="menu2">

                    <option selected value="">--Seleccione las entradas--</option>
                    @for ($i = 1; $i <= $concert->stock; $i++)
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
                <p class="selection">Seleccione su metodo de pago</p>
            </table>
            <table class="payMethod1">
                <td>
                    <button class="payMethod">
                <img src="{{asset('img/efectivo.png')}}" class="pago" width="30" height="30">
                <p>Efectivo</p>
                    </button>
                </td>
                <td>
                    <button class="payMethod">
                <img src="{{asset('img/transferencia.png')}}" class="pago" width="30" height="30">
                <p>Transferencia</p>
                    </button>
                </td>
            </table>
            <table class="payMethod2">
                <td>
                <button class="payMethod">
                <img src="{{asset('img/tarjetaCredito.png')}}" class="pago" width="30" height="30">
                <p >Tarjeta de Credito</p>
                </button>
                </td>

                <td>
                <button class="payMethod">
                <img src="{{asset('img/tarjetaDebito.png')}}" class="pago" width="30" height="30">
                <p >Tarjeta de Debito</p>
                </button>
                </td>
            </table>
        </div>

        <div class="totalText">
            <p class="totalPrice">TOTAL: $</p>
            <p id="total" class="totalPrice"> 0 </p>
        </div>

        <input id="total-s" name="total" value="{{ $concert->price }}" hidden>
        <input name="reservation_number" value="" hidden>


        <button id = "buttonBuy" class="buttonBuy">COMPRAR</button>
        @error('quantity')
            <p class="errorMsg">{{ $message }}</p>
        @enderror
        @if (session('message'))
            <p class="errorMsg">{{ session('message') }}</p>
        @endif
        @error('pay_method')
        <p class="errorMsg">
            {{ $message }}</p>
        @enderror


    </form>



    <script>
        const button = document.getElementById('buttonBuy');
        const quantity = document.getElementById('quantity');
        const total = document.getElementById('total');
        const total_Submit = document.getElementById('total-s');
        window.addEventListener('DOMContentLoaded', (e) => {
            e.preventDefault();
            button.disabled = true;
        })
        quantity.addEventListener('click', (e) => {
            e.preventDefault();
            button.disabled = false
            console.log(quantity.value);
            const sell = {{ $concert->price }} * quantity.value;
            total.textContent = sell;
            totalSubmit.value = sell;
        })
    </script>

</body>

</html>
@endauth
