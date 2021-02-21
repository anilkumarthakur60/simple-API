<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException($request,$e)
	{
			if ($this->isModel($e)) {
                return $this->ModelResponse($e);
            }


            if ($this->isHttp($e)) {
                return $this->HttpResponse($e);
            }

            return parent::render($request, $e);

	}




	protected function isModel($e)
	{
		return $e instanceof ModelNotFoundException;
	}

	protected function isHttp($e)
	{
		return $e instanceof NotFoundHttpException;
	}

	protected function ModelResponse($e)
	{
		return response()->json([
                    'errors' => 'Model Model not found'
                ],Response::HTTP_NOT_FOUND);
	}

	protected function HttpResponse($e)
	{
		return response()->json([
                    'errors' => 'Route Not Defined'
                ],Response::HTTP_NOT_FOUND);
	}





}
