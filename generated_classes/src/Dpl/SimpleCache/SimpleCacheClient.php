<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Dpl\SimpleCache;

/**
 */
class SimpleCacheClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Dpl\SimpleCache\SetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Set(\Dpl\SimpleCache\SetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/simple_cache.SimpleCache/Set',
        $argument,
        ['\Dpl\SimpleCache\SetResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Dpl\SimpleCache\DelRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Del(\Dpl\SimpleCache\DelRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/simple_cache.SimpleCache/Del',
        $argument,
        ['\Dpl\SimpleCache\DelResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Dpl\SimpleCache\GetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Get(\Dpl\SimpleCache\GetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/simple_cache.SimpleCache/Get',
        $argument,
        ['\Dpl\SimpleCache\GetResponse', 'decode'],
        $metadata, $options);
    }

}
