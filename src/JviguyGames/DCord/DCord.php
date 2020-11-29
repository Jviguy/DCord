<?php

namespace JviguyGames\DCord;

use JviguyGames\DCord\Embeds\Embed;
use pocketmine\plugin\PluginBase;

class DCord extends PluginBase
{

        // An Example usage using the object style
        //        $webhook = new Webhook("https://discord.com/api/webhooks/RESTOFTHEURLHERE");
        //        $message = new Message();
        //        $embed = new Embed();
        //        $embed->setTitle("TEST");
        //        $embed->SetColor(new EmbedColor(0,255,0));
        //        $embed->setDescription("Testing colors now");
        //        $embed->Add(new EmbedAuthor("Jviguy",null,"https://i.insider.com/5463d18b6da811b76fd2229e?width=1200&format=jpeg"));
        //        $message->addEmbed($embed);
        //        $message->setUsername("DCord PMMP API");
        //        $this->getLogger()->info(json_encode($message,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
        //        $this->getLogger()->info($webhook->Send($message));

    /**
     * Returns a webhook for those lazy enough not to use Objects themselves
     *
     * @param string $url the url the webhook object will point too
     * @return Webhook the webhook object to be used
     */
    public function NewWebhook(string $url): Webhook {
        return new Webhook($url);
    }

    public function NewMessage(): Message {
        return new Message();
    }

    public function NewEmbed(): Embed {
        return new Embed();
    }
}