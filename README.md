# composer-unused_issue287

demo for https://github.com/composer-unused/composer-unused/issues/287

## setup 

run `composer run-script dev-setup`

## tests

* run composer-unused 0.8.0  via `composer run-script test:composer-unused-0.8.0`
* run composer-unused 0.7.12 via `composer run-script test:composer-unused-0.7.12`

## description

This package requires `swaggest/json-schema` in [`composer.json`](composer.json).  
`swaggest/json-schema` provides a psr4-loadable namespace `Swaggest\JsonSchema`.

This package has a [file](src/Foo.php) in it, that uses a symbol from this namespace: `Swaggest\JsonSchema\InvalidValue`.  
For the use the namespace `Swaggest\JsonSchema` was used, and the symbol was accessed as `JsonSchema\InvalidValue`.
In contrast to typical use of the whole symbol.

## expected outcome

the expected outcome is based on how PHP works
and how running `composer-unusd` v0.7.12 (via `composer run-script test:composer-unused-0.7.12`) acted.

As the namespace sis properly made known via `use Swaggest\JsonSchema;`
and the symbol being used as `JsonSchema\InvalidValue` - which is totally fine for PHP,
it is expected to find the source package `swaggest/json-schema` being detected as used.

```text
Results
-------

Found 1 used, 0 unused, 0 ignored and 0 zombie packages

 Used packages
 ✓ swaggest/json-schema

 Unused packages

 Ignored packages

 Zombies exclusions (did not match any package))
```

## observed outcome

Running `composer-unusd` v0.8.0 (via `composer run-script test:composer-unused-0.8.0`)
produced the following results.

The package `swaggest/json-schema` is not detected as used.  
This is unexpected.

```text
Results
-------

Found 0 used, 1 unused, 0 ignored and 0 zombie packages

 Used packages

 Unused packages
 ✗ swaggest/json-schema

 Ignored packages

 Zombies exclusions (did not match any package))
```