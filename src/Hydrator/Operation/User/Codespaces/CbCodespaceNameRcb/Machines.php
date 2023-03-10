<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Hydrator\Operation\User\Codespaces\CbCodespaceNameRcb;

use EventSauce\ObjectHydrator\IterableList;
use EventSauce\ObjectHydrator\ObjectMapper;
use EventSauce\ObjectHydrator\UnableToHydrateObject;
use EventSauce\ObjectHydrator\UnableToSerializeObject;
use Generator;

class Machines implements ObjectMapper
{
    private array $hydrationStack = [];
    public function __construct() {}

    /**
     * @template T of object
     * @param class-string<T> $className
     * @return T
     */
    public function hydrateObject(string $className, array $payload): object
    {
        return match($className) {
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\Operation\Codespaces\RepoMachinesForAuthenticatedUser\Response\Applicationjson\H200' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Operation⚡️Codespaces⚡️RepoMachinesForAuthenticatedUser⚡️Response⚡️Applicationjson⚡️H200($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\CodespaceMachine' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️CodespaceMachine($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\BasicError' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️BasicError($payload),
            default => throw UnableToHydrateObject::noHydrationDefined($className, $this->hydrationStack),
        };
    }
    
            
    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Operation⚡️Codespaces⚡️RepoMachinesForAuthenticatedUser⚡️Response⚡️Applicationjson⚡️H200(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\Operation\Codespaces\RepoMachinesForAuthenticatedUser\Response\Applicationjson\H200
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['total_count'] ?? null;

            if ($value === null) {
                $missingFields[] = 'total_count';
                goto after_total_count;
            }

            $properties['total_count'] = $value;

            after_total_count:

            $value = $payload['machines'] ?? null;

            if ($value === null) {
                $missingFields[] = 'machines';
                goto after_machines;
            }

            static $machinesCaster1;

            if ($machinesCaster1 === null) {
                $machinesCaster1 = new \EventSauce\ObjectHydrator\PropertyCasters\CastListToType(...array (
  0 => 'ApiClients\\Client\\GitHubEnterpriseCloud\\Schema\\CodespaceMachine',
));
            }

            $value = $machinesCaster1->cast($value, $this);

            $properties['machines'] = $value;

            after_machines:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\Operation\Codespaces\RepoMachinesForAuthenticatedUser\Response\Applicationjson\H200', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\Operation\Codespaces\RepoMachinesForAuthenticatedUser\Response\Applicationjson\H200::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\Operation\Codespaces\RepoMachinesForAuthenticatedUser\Response\Applicationjson\H200(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\Operation\Codespaces\RepoMachinesForAuthenticatedUser\Response\Applicationjson\H200', $exception, stack: $this->hydrationStack);
        }
    }

        
    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️CodespaceMachine(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\CodespaceMachine
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['name'] ?? null;

            if ($value === null) {
                $missingFields[] = 'name';
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['display_name'] ?? null;

            if ($value === null) {
                $missingFields[] = 'display_name';
                goto after_display_name;
            }

            $properties['display_name'] = $value;

            after_display_name:

            $value = $payload['operating_system'] ?? null;

            if ($value === null) {
                $missingFields[] = 'operating_system';
                goto after_operating_system;
            }

            $properties['operating_system'] = $value;

            after_operating_system:

            $value = $payload['storage_in_bytes'] ?? null;

            if ($value === null) {
                $missingFields[] = 'storage_in_bytes';
                goto after_storage_in_bytes;
            }

            $properties['storage_in_bytes'] = $value;

            after_storage_in_bytes:

            $value = $payload['memory_in_bytes'] ?? null;

            if ($value === null) {
                $missingFields[] = 'memory_in_bytes';
                goto after_memory_in_bytes;
            }

            $properties['memory_in_bytes'] = $value;

            after_memory_in_bytes:

            $value = $payload['cpus'] ?? null;

            if ($value === null) {
                $missingFields[] = 'cpus';
                goto after_cpus;
            }

            $properties['cpus'] = $value;

            after_cpus:

            $value = $payload['prebuild_availability'] ?? null;

            if ($value === null) {
                $properties['prebuild_availability'] = null;
                goto after_prebuild_availability;
            }

            $properties['prebuild_availability'] = $value;

            after_prebuild_availability:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\CodespaceMachine', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\CodespaceMachine::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\CodespaceMachine(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\CodespaceMachine', $exception, stack: $this->hydrationStack);
        }
    }

        
    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️BasicError(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\BasicError
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['message'] ?? null;

            if ($value === null) {
                $properties['message'] = null;
                goto after_message;
            }

            $properties['message'] = $value;

            after_message:

            $value = $payload['documentation_url'] ?? null;

            if ($value === null) {
                $properties['documentation_url'] = null;
                goto after_documentation_url;
            }

            $properties['documentation_url'] = $value;

            after_documentation_url:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $properties['url'] = null;
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:

            $value = $payload['status'] ?? null;

            if ($value === null) {
                $properties['status'] = null;
                goto after_status;
            }

            $properties['status'] = $value;

            after_status:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\BasicError', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\BasicError::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\BasicError(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\BasicError', $exception, stack: $this->hydrationStack);
        }
    }
    
    private function serializeViaTypeMap(string $accessor, object $object, array $payloadToTypeMap): array
    {
        foreach ($payloadToTypeMap as $payloadType => [$valueType, $method]) {
            if (is_a($object, $valueType)) {
                return [$accessor => $payloadType] + $this->{$method}($object);
            }
        }

        throw new \LogicException('No type mapped for object of class: ' . get_class($object));
    }

    public function serializeObject(object $object): mixed
    {
        return $this->serializeObjectOfType($object, get_class($object));
    }

    /**
     * @template T
     *
     * @param T               $object
     * @param class-string<T> $className
     */
    public function serializeObjectOfType(object $object, string $className): mixed
    {
        try {
            return match($className) {
                'array' => $this->serializeValuearray($object),
            'Ramsey\Uuid\UuidInterface' => $this->serializeValueRamsey⚡️Uuid⚡️UuidInterface($object),
            'DateTime' => $this->serializeValueDateTime($object),
            'DateTimeImmutable' => $this->serializeValueDateTimeImmutable($object),
            'DateTimeInterface' => $this->serializeValueDateTimeInterface($object),
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\Operation\Codespaces\RepoMachinesForAuthenticatedUser\Response\Applicationjson\H200' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Operation⚡️Codespaces⚡️RepoMachinesForAuthenticatedUser⚡️Response⚡️Applicationjson⚡️H200($object),
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\CodespaceMachine' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️CodespaceMachine($object),
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\BasicError' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️BasicError($object),
                default => throw new \LogicException('No serialization defined for $className'),
            };
        } catch (\Throwable $exception) {
            throw UnableToSerializeObject::dueToError($className, $exception);
        }
    }
    
    
    private function serializeValuearray(mixed $value): mixed
    {
        static $serializer;
        
        if ($serializer === null) {
            $serializer = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeArrayItems(...array (
));
        }
        
        return $serializer->serialize($value, $this);
    }


    private function serializeValueRamsey⚡️Uuid⚡️UuidInterface(mixed $value): mixed
    {
        static $serializer;
        
        if ($serializer === null) {
            $serializer = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeUuidToString(...array (
));
        }
        
        return $serializer->serialize($value, $this);
    }


    private function serializeValueDateTime(mixed $value): mixed
    {
        static $serializer;
        
        if ($serializer === null) {
            $serializer = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeDateTime(...array (
));
        }
        
        return $serializer->serialize($value, $this);
    }


    private function serializeValueDateTimeImmutable(mixed $value): mixed
    {
        static $serializer;
        
        if ($serializer === null) {
            $serializer = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeDateTime(...array (
));
        }
        
        return $serializer->serialize($value, $this);
    }


    private function serializeValueDateTimeInterface(mixed $value): mixed
    {
        static $serializer;
        
        if ($serializer === null) {
            $serializer = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeDateTime(...array (
));
        }
        
        return $serializer->serialize($value, $this);
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Operation⚡️Codespaces⚡️RepoMachinesForAuthenticatedUser⚡️Response⚡️Applicationjson⚡️H200(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\Operation\Codespaces\RepoMachinesForAuthenticatedUser\Response\Applicationjson\H200);
        $result = [];

        $total_count = $object->total_count;
        after_total_count:        $result['total_count'] = $total_count;

        
        $machines = $object->machines;
        static $machinesSerializer0;

        if ($machinesSerializer0 === null) {
            $machinesSerializer0 = new \EventSauce\ObjectHydrator\PropertyCasters\CastListToType(...array (
  0 => 'ApiClients\\Client\\GitHubEnterpriseCloud\\Schema\\CodespaceMachine',
));
        }
        
        $machines = $machinesSerializer0->serialize($machines, $this);
        after_machines:        $result['machines'] = $machines;


        return $result;
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️CodespaceMachine(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\CodespaceMachine);
        $result = [];

        $name = $object->name;
        after_name:        $result['name'] = $name;

        
        $display_name = $object->display_name;
        after_display_name:        $result['display_name'] = $display_name;

        
        $operating_system = $object->operating_system;
        after_operating_system:        $result['operating_system'] = $operating_system;

        
        $storage_in_bytes = $object->storage_in_bytes;
        after_storage_in_bytes:        $result['storage_in_bytes'] = $storage_in_bytes;

        
        $memory_in_bytes = $object->memory_in_bytes;
        after_memory_in_bytes:        $result['memory_in_bytes'] = $memory_in_bytes;

        
        $cpus = $object->cpus;
        after_cpus:        $result['cpus'] = $cpus;

        
        $prebuild_availability = $object->prebuild_availability;

        if ($prebuild_availability === null) {
            goto after_prebuild_availability;
        }
        after_prebuild_availability:        $result['prebuild_availability'] = $prebuild_availability;


        return $result;
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️BasicError(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\BasicError);
        $result = [];

        $message = $object->message;

        if ($message === null) {
            goto after_message;
        }
        after_message:        $result['message'] = $message;

        
        $documentation_url = $object->documentation_url;

        if ($documentation_url === null) {
            goto after_documentation_url;
        }
        after_documentation_url:        $result['documentation_url'] = $documentation_url;

        
        $url = $object->url;

        if ($url === null) {
            goto after_url;
        }
        after_url:        $result['url'] = $url;

        
        $status = $object->status;

        if ($status === null) {
            goto after_status;
        }
        after_status:        $result['status'] = $status;


        return $result;
    }
    
    

    /**
     * @template T
     *
     * @param class-string<T> $className
     * @param iterable<array> $payloads;
     *
     * @return IterableList<T>
     *
     * @throws UnableToHydrateObject
     */
    public function hydrateObjects(string $className, iterable $payloads): IterableList
    {
        return new IterableList($this->doHydrateObjects($className, $payloads));
    }

    private function doHydrateObjects(string $className, iterable $payloads): Generator
    {
        foreach ($payloads as $index => $payload) {
            yield $index => $this->hydrateObject($className, $payload);
        }
    }

    /**
     * @template T
     *
     * @param class-string<T> $className
     * @param iterable<array> $payloads;
     *
     * @return IterableList<T>
     *
     * @throws UnableToSerializeObject
     */
    public function serializeObjects(iterable $payloads): IterableList
    {
        return new IterableList($this->doSerializeObjects($payloads));
    }

    private function doSerializeObjects(iterable $objects): Generator
    {
        foreach ($objects as $index => $object) {
            yield $index => $this->serializeObject($object);
        }
    }
}
