# DCord
a discord webhook library for php and pmmp *VERY OBJECTIVE*
## Usage
```php
$webhook = new Webhook("https://discord.com/api/webhooks/RESTOFTHEURLHERE");
$message = new Message();
$embed = new Embed();
$embed->setTitle("TEST");
$embed->SetColor(new EmbedColor(0,255,0));
$embed->setDescription("Testing colors now");
$embed->Add(new EmbedAuthor("Jviguy",null,"https://i.insider.com/5463d18b6da811b76fd2229e?width=1200&format=jpeg"));
$message->addEmbed($embed);
$message->setUsername("DCord PMMP API");
$webhook->SendAsync($message);```
