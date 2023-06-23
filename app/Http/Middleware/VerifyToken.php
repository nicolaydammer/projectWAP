<?php

namespace App\Http\Middleware;

use App\Models\Customer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpFoundation\Response;

class VerifyToken
{
    /**
     * @throws TokenMismatchException
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->verify($request)) {
            return $next($request);
        }

        throw new TokenMismatchException('Token mismatch');
    }

    private function verify(Request $request): bool
    {
        return Customer::query()->where('api_token', $request->bearerToken())->exists();
    }
}
