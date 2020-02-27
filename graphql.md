composer require overblog/graphql-bundle
composer req --dev overblog/graphiql-bundle

Browse to /graphiql

https://symfony.fi/entry/adding-a-graphql-api-to-your-symfony-flex-app


test queries
```graphql
{
  posts {
    id
    message
  }
}

```
```graphql
{
  post (id:"5563b4ab-5416-4771-96a0-e2c3bc4df893") {
    id
    message
  }
}

```


