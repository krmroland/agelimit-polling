<?php

namespace App\Http;

class Flash
{
    /**
     * the title for the flash.
     */
    protected $title = 'Great';
    /**
     * the message for the title.
     */
    protected $message;
    /**
     * the type of the message.
     *
     * @var string
     */
    protected $type = 'success';
    /**
     * the type of flash message.
     *
     * @var string
     */
    protected $flash_key = 'flash_message';

    /**
     * sets the the flash message.
     *
     * @param string $message
     *
     * @return self
     */
    public function message($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * sets the title on the instance.
     *
     * @param string $title
     *
     * @return self
     */
    public function title($title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * sets the flash type.
     *
     * @param string $type
     *
     * @return self
     */
    public function type($type = 'success')
    {
        $this->type = $type;

        return $this;
    }

    /**
     * flashes the object properties to the session.
     */
    public function make()
    {
        session()->flash($this->flash_key, $this->properties());
    }

    /**
     * gets the object properties.
     *
     * @return array
     */
    protected function properties()
    {
        return [
        'title' => $this->title,
        'message' => $this->message,
        'type' => $this->type,
        ];
    }

    public function error($message = null)
    {
        $message ? $this->message = $message : '';
        $this->title = 'Sorry';
        $this->type = 'error';

        return $this;
    }

    public function __destruct()
    {
        return $this->make();
    }

    public function success($message)
    {
        $this->type = 'success';
        $this->message = $message;

        return $this;
    }
}
