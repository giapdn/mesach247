<?php

namespace App\Http\Middleware;

use App\Models\Banner;
use App\Models\TheLoai;
use Closure;
use Illuminate\Support\Facades\View;

class ShareCommonData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $commonData = [
            'theLoais' => TheLoai::all(),
            // 'slideImg' => Banner::with('hinhAnhBanner '),
        ];

        // Chia sẻ dữ liệu với tất cả view
        View::share($commonData);

        return $next($request);
    }
}