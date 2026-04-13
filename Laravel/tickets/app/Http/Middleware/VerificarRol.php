<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class VerificarRol
{
 /**
 * $rolesPermitidos puede ser un string "admin"
 * o varios roles separados por coma: "admin,gerente"
 */
 public function handle(Request $request, Closure $next, string
...$rolesPermitidos): Response 
 {
 // 1. ¿Está autenticado?
 if (!auth()->check()) { # Verifica si hay sesión activa.
 return redirect()->route('login')
 ->with('error', 'Debes iniciar sesión.');
 }
 // 2. ¿Tiene alguno de los roles requeridos?
 $rolUsuario = auth()->user()->rol; # Lee el campo 'rol' del usuario autenticado.
 if (!in_array($rolUsuario, $rolesPermitidos)) { # Verifica si el rol del usuario está en
 return redirect()->route('dashboard') # Si no tiene permiso, lo manda al
 ->with('error', 'No tienes permiso para acceder a esta
sección.');
 }
 // 3. Todo correcto → continuar
 return $next($request);
 }
}