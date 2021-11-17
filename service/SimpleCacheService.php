<?php declare(strict_types=1);

namespace service;

use Dpl\SimpleCache\DelRequest;
use Dpl\SimpleCache\DelResponse;
use Dpl\SimpleCache\GetRequest;
use Dpl\SimpleCache\GetResponse;
use Dpl\SimpleCache\SetRequest;
use Dpl\SimpleCache\SetResponse;
use Dpl\SimpleCache\SimpleCacheInterface;
use Spiral\GRPC\ContextInterface;
use Spiral\GRPC\Exception\NotFoundException;

class SimpleCacheService implements SimpleCacheInterface
{
	protected $storage = [];

	public function Set(ContextInterface $ctx, SetRequest $in): SetResponse
	{
		$this->storage[$in->getKey()] = $in->getValue();
		return new SetResponse(['success' => true]);
	}

	public function Del(ContextInterface $ctx, DelRequest $in): DelResponse
	{
		unset($this->storage[$in->getKey()]);
		return new DelResponse(['success' => true]);
	}

	public function Get(ContextInterface $ctx, GetRequest $in): GetResponse
	{
		if (!array_key_exists($in->getKey(), $this->storage)) {
			throw new NotFoundException();
		}

		return new GetResponse([
			'key' => $in->getKey(),
			'value' => $this->storage[$in->getKey()] ?? null,
		]);
	}
}