# Makefile

# Note `$(: a b c)` allows to put a comment in the middle of a bash command
create_classes:
	# PHP
	protoc /var/www/simplecache.proto \
		--php_out=/var/www/generated_classes/src \
		$(: custom plugin from roadrunner to generate server interface) \
		--php-grpc_out=/var/www/generated_classes/src \
		$(: generates the client code) \
		--grpc_out=/var/www/generated_classes/src \
		--plugin=protoc-gen-grpc=/protobuf/grpc/bins/opt/grpc_php_plugin \
		--proto_path /var/www

proto:
	rm -rf generated_classes/src
	mkdir -p generated_classes/src
	docker-compose run dplgrpc-service make create_classes

# easy to remember rule name
build-appserver-server: appserver/appserver
# actual rule with dependencies on any `go` file within `appserver/*` being updated
appserver/appserver: $(wildcard appserver/**/*.go) $(wildcard appserver/*.go)
	docker-compose run dplgrpc-service