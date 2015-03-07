<?php

/**
 * Created by PhpStorm.
 * User: ichikawashingo
 * Date: 15/03/07
 * Time: 14:17
 */
class LoginController extends BaseController
{

    public function loginWithFacebook() {

        // get data from input
        $code = Input::get( 'code' );

        // get fb service
        $fb = OAuth::consumer( 'Facebook' );

        // check if code is valid

        // if code is provided get user data and sign in
        if ( !empty( $code ) ) {

            // This was a callback request from facebook, get the token
            $token = $fb->requestAccessToken( $code );

            // Send a request with it
            $result = json_decode( $fb->request( '/me' ), true );
            Session::reflash();
            Session::put('user', [
                'id' => $result['id'],
                'name' => $result['name'],
                'picture' => 'https://graph.facebook.com/' .$result['id'].'/picture'
            ]);
            Session::put('user_id', $result['id']);

            return Redirect::to('/');
        }
        // if not ask for permission first
        else {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
            return Redirect::to( (string)$url );
        }

    }
}