<?php
namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 *
 */
trait ExceptionTrait
{

  function apiException($request, $e)
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
    return response( [
      'errors' => 'Product Model Not Found'
    ], Response::HTTP_NOT_FOUND);
  }

  protected function HttpResponse($e)
  {
    return response( [
      'errors' => 'Incorrect route'
    ], Response::HTTP_NOT_FOUND);
  }

}

?>
