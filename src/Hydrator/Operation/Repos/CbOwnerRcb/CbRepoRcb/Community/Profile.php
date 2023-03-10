<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Community;

use EventSauce\ObjectHydrator\IterableList;
use EventSauce\ObjectHydrator\ObjectMapper;
use EventSauce\ObjectHydrator\UnableToHydrateObject;
use EventSauce\ObjectHydrator\UnableToSerializeObject;
use Generator;

class Profile implements ObjectMapper
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
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\CommunityProfile' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️CommunityProfile($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\CommunityProfile\Files' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️CommunityProfile⚡️Files($payload),
            default => throw UnableToHydrateObject::noHydrationDefined($className, $this->hydrationStack),
        };
    }
    
            
    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️CommunityProfile(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\CommunityProfile
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['health_percentage'] ?? null;

            if ($value === null) {
                $missingFields[] = 'health_percentage';
                goto after_health_percentage;
            }

            $properties['health_percentage'] = $value;

            after_health_percentage:

            $value = $payload['description'] ?? null;

            if ($value === null) {
                $properties['description'] = null;
                goto after_description;
            }

            $properties['description'] = $value;

            after_description:

            $value = $payload['documentation'] ?? null;

            if ($value === null) {
                $properties['documentation'] = null;
                goto after_documentation;
            }

            $properties['documentation'] = $value;

            after_documentation:

            $value = $payload['files'] ?? null;

            if ($value === null) {
                $missingFields[] = 'files';
                goto after_files;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'files';
                    $value = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️CommunityProfile⚡️Files($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['files'] = $value;

            after_files:

            $value = $payload['updated_at'] ?? null;

            if ($value === null) {
                $properties['updated_at'] = null;
                goto after_updated_at;
            }

            $properties['updated_at'] = $value;

            after_updated_at:

            $value = $payload['content_reports_enabled'] ?? null;

            if ($value === null) {
                $properties['content_reports_enabled'] = null;
                goto after_content_reports_enabled;
            }

            $properties['content_reports_enabled'] = $value;

            after_content_reports_enabled:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\CommunityProfile', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\CommunityProfile::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\CommunityProfile(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\CommunityProfile', $exception, stack: $this->hydrationStack);
        }
    }

        
    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️CommunityProfile⚡️Files(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\CommunityProfile\Files
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['code_of_conduct'] ?? null;

            if ($value === null) {
                $properties['code_of_conduct'] = null;
                goto after_code_of_conduct;
            }

            $properties['code_of_conduct'] = $value;

            after_code_of_conduct:

            $value = $payload['code_of_conduct_file'] ?? null;

            if ($value === null) {
                $properties['code_of_conduct_file'] = null;
                goto after_code_of_conduct_file;
            }

            $properties['code_of_conduct_file'] = $value;

            after_code_of_conduct_file:

            $value = $payload['license'] ?? null;

            if ($value === null) {
                $properties['license'] = null;
                goto after_license;
            }

            $properties['license'] = $value;

            after_license:

            $value = $payload['contributing'] ?? null;

            if ($value === null) {
                $properties['contributing'] = null;
                goto after_contributing;
            }

            $properties['contributing'] = $value;

            after_contributing:

            $value = $payload['readme'] ?? null;

            if ($value === null) {
                $properties['readme'] = null;
                goto after_readme;
            }

            $properties['readme'] = $value;

            after_readme:

            $value = $payload['issue_template'] ?? null;

            if ($value === null) {
                $properties['issue_template'] = null;
                goto after_issue_template;
            }

            $properties['issue_template'] = $value;

            after_issue_template:

            $value = $payload['pull_request_template'] ?? null;

            if ($value === null) {
                $properties['pull_request_template'] = null;
                goto after_pull_request_template;
            }

            $properties['pull_request_template'] = $value;

            after_pull_request_template:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\CommunityProfile\Files', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\CommunityProfile\Files::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\CommunityProfile\Files(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\CommunityProfile\Files', $exception, stack: $this->hydrationStack);
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
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\CommunityProfile' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️CommunityProfile($object),
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\CommunityProfile\Files' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️CommunityProfile⚡️Files($object),
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


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️CommunityProfile(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\CommunityProfile);
        $result = [];

        $health_percentage = $object->health_percentage;
        after_health_percentage:        $result['health_percentage'] = $health_percentage;

        
        $description = $object->description;

        if ($description === null) {
            goto after_description;
        }
        after_description:        $result['description'] = $description;

        
        $documentation = $object->documentation;

        if ($documentation === null) {
            goto after_documentation;
        }
        after_documentation:        $result['documentation'] = $documentation;

        
        $files = $object->files;
        $files = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️CommunityProfile⚡️Files($files);
        after_files:        $result['files'] = $files;

        
        $updated_at = $object->updated_at;

        if ($updated_at === null) {
            goto after_updated_at;
        }
        after_updated_at:        $result['updated_at'] = $updated_at;

        
        $content_reports_enabled = $object->content_reports_enabled;

        if ($content_reports_enabled === null) {
            goto after_content_reports_enabled;
        }
        after_content_reports_enabled:        $result['content_reports_enabled'] = $content_reports_enabled;


        return $result;
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️CommunityProfile⚡️Files(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\CommunityProfile\Files);
        $result = [];

        $code_of_conduct = $object->code_of_conduct;

        if ($code_of_conduct === null) {
            goto after_code_of_conduct;
        }
        after_code_of_conduct:        $result['code_of_conduct'] = $code_of_conduct;

        
        $code_of_conduct_file = $object->code_of_conduct_file;

        if ($code_of_conduct_file === null) {
            goto after_code_of_conduct_file;
        }
        after_code_of_conduct_file:        $result['code_of_conduct_file'] = $code_of_conduct_file;

        
        $license = $object->license;

        if ($license === null) {
            goto after_license;
        }
        after_license:        $result['license'] = $license;

        
        $contributing = $object->contributing;

        if ($contributing === null) {
            goto after_contributing;
        }
        after_contributing:        $result['contributing'] = $contributing;

        
        $readme = $object->readme;

        if ($readme === null) {
            goto after_readme;
        }
        after_readme:        $result['readme'] = $readme;

        
        $issue_template = $object->issue_template;

        if ($issue_template === null) {
            goto after_issue_template;
        }
        after_issue_template:        $result['issue_template'] = $issue_template;

        
        $pull_request_template = $object->pull_request_template;

        if ($pull_request_template === null) {
            goto after_pull_request_template;
        }
        after_pull_request_template:        $result['pull_request_template'] = $pull_request_template;


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
