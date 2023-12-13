<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\ErrorHandler\Exception\FlattenException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            
        //     if($e->getStatusCode() == 500 ){
        //     return redirect('/');
        // }
            //
        });
        
        
        
        // $this->renderable(function (NotFoundHttpException $e, $request) {
        //     return redirect('/');
        // });
    }
    
    // public function render($request, Exception $e)
    // {   
    //     if($this->isHttpException($e))
    //     {
    //         switch (intval($e->getStatusCode())) {
    //             // not found
    //             case 404:
    //                 return redirect()->route('front.index');
    //                 break;
    //             // internal error
    //             case 500:
    //                 return redirect()->route('front.index');
    //                 break;
    
    //             default:
    //                 return $this->renderHttpException($e);
    //                 break;
    //         }
    //     }
       
    //         return parent::render($request, $e);      
    // }
    

}
