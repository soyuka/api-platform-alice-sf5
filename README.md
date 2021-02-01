# Messenger example

Run these two commands:
```
symfony server:start
bin/console messenger:consume async
```

Post a SomeInput:
```
curl -k -X POST -H "Content-Type: application/json" http://localhost:8000/api/cars -d '{"foo": "bar"}'
```
