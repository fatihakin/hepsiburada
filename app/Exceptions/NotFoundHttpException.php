<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException as NFHE;

/**
 * @OA\Schema()
 */

/**
 * Class NotFoundHttpException
 * @package App\Exceptions
 * @OA\Schema()
 */
class NotFoundHttpException extends NFHE
{
    /**
     * The err message
     * @var string
     *
     * @OA\Property(
     *   property="message",
     *   type="string",
     *   example="Not Found"
     * )
     */
    public function __construct(string $message = null)
    {
        parent::__construct($message ?? 'Resource not found');
    }
}
