{{-- resources/views/partials/footer.blade.php --}}
<footer>
 @php
 $anio = date('Y');
 $autor = "Fernando Sañudo B"; // ← ¡Cambia esto por tu nombre!
 @endphp
 <p> FrikiFest &copy; {{ $anio }} — Desarrollado por <strong>{{ $autor }}</strong></p>
 <p>Práctica de Blade Templates | Laravel 12</p>
</footer>