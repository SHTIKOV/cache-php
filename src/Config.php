<?php declare (strict_types = 1);

namespace Shtikov\CachePHP;

use Shtikov\CachePHP\Tools\Misc as MiscTools;

final class Config
{
    use MiscTools;

    public const DEFAULT_HOST = 'localhost';
    public const DEFAULT_PORT = 6379;
    public const DEFAULT_LIFETIME = 5000;

    /** @var string */
    private $host = self::DEFAULT_HOST;
    /** @var int */
    private $port = self::DEFAULT_PORT;
    /** @var int */
    private $lifetime = self::DEFAULT_LIFETIME;

    public function __construct(?string $host = null, ?int $port = null, ?int $lifetime = null)
    {
        if (!\is_null($host)) {
            $this->host = $host;
        }
        if (!\is_null($port)) {
            $this->port = $port;
        }
        if (!\is_null($lifetime)) {
            $this->lifetime = $lifetime;
        }
    }

	public function getHost(): string
	{
		return $this->host;
	}

	public function setHost(string $host): Config
	{
		$this->host = $host;

		return $this;
	}

	public function getPort(): int
	{
		return $this->port;
	}

	public function setPort(int $port): Config
	{
		$this->port = $port;

		return $this;
	}

	public function getLifetime(): int
	{
		return $this->lifetime;
	}

	public function setLifetime(int $lifetime): Config
	{
		$this->lifetime = $lifetime;

		return $this;
    }

    public function getUrl(): string
    {
        return $this->host.':'.$this->port;
    }
    
    public static function fromArray(array $data): Config
    {
        $self = new self();
        if (isset($data['host']) && $data['host']) {
            $self->setHost($data['host']);
        }

        if (isset($data['port']) && $data['port']) {
            $self->setPort($self->toInt($data['port']));
        }

        if (isset($data['lifetime']) && $data['lifetime']) {
            $self->setLifetime($self->toInt($data['lifetime']));
        }

        return $self;
    }
}