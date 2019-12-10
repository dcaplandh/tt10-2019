@foreach ($productos as $producto)
    <div>
        <h4>{{$producto->nombre}}</h4>
        <p>{{$producto->descripcion}}</p>
        <span>${{$producto->precio}}</p>
            <form action="/cargarAlCarrito" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$producto->id}}">
                <button type="submit">Agregar al carrito</button>
            </form>
            
    </div>
@endforeach