<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: simplecache.proto

namespace Dpl\SimpleCache\Meta;

class Simplecache
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
?
simplecache.protosimple_cache"(

SetRequest
key (	
value (	"
SetResponse
success ("

DelRequest
key (	"
DelResponse
success ("

GetRequest
key (	")
GetResponse
key (	
value (	2?
SimpleCache:
Set.simple_cache.SetRequest.simple_cache.SetResponse:
Del.simple_cache.DelRequest.simple_cache.DelResponse:
Get.simple_cache.GetRequest.simple_cache.GetResponseB)?Dpl\\SimpleCache?Dpl\\SimpleCache\\Metabproto3'
        , true);

        static::$is_initialized = true;
    }
}

