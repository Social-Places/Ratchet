<?php
namespace Ratchet\Session\Storage\Proxy;
use Symfony\Component\HttpFoundation\Session\Storage\Proxy\SessionHandlerProxy;

class VirtualProxy extends SessionHandlerProxy {
    /**
     * @var string
     */
    protected $_sessionId;

    /**
     * @var string
     */
    protected $_sessionName;

    /**
     * {@inheritdoc}
     */
    public function __construct(\SessionHandlerInterface $handler) {
        parent::__construct($handler);

        $this->saveHandlerName = 'user';
        $this->_sessionName    = ini_get('session.name');
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): string {
        return $this->_sessionId;
    }

    /**
     * {@inheritdoc}
     */
    public function setId(string $id) {
        $this->_sessionId = $id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string {
        return $this->_sessionName;
    }

    /**
     * DO NOT CALL THIS METHOD
     * @internal
     */
    public function setName(string $name) {
        throw new \RuntimeException("Can not change session name in VirtualProxy");
    }
}
