<?php

namespace Plokko\LocalePath\Middleware;

use Illuminate\Http\Request;

class RemoveLocaleParameter
{
    public function handle($request, Closure $next,$parameterName='locale')
    {
        $locale = $request->route()->parameter($parameterName);
        $request->route()->forgetParameter($parameterName);

        if(!in_array($locale,config('app.allowed_locales'))){
            $locale = config('app.locale');
        }

        App::setLocale($locale);

        return $next($request);
    }
}
