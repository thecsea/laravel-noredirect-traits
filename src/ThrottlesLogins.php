<?php
/**
 * Created by PhpStorm.
 * User: Claudio Cardinale <cardi@thecsea.it>
 * Date: 17/11/15
 * Time: 18.21
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

namespace it\thecsea\laravel\noredirect_traits;

use Illuminate\Foundation\Auth\ThrottlesLogins as ThrottlesLoginsOriginal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiter;

trait ThrottlesLogins
{

    use ThrottlesLoginsOriginal{
        sendLockoutResponse as sendLockoutResponseOriginal;
    }

    /**
     * Redirect the user after determining they are locked out.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendLockoutResponse(Request $request)
    {
        $seconds = app(RateLimiter::class)->availableIn(
            $request->input($this->loginUsername()).$request->ip()
        );

        return new JsonResponse([
            $this->loginUsername() => $this->getLockoutErrorMessage($seconds),
        ], 422);
    }
}