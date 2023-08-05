## API
GET `/api/skin-api/skins/{user_id or nickname}`

GET `/api/skin-api/avatars/combo/{user_id or nickname}`

GET `/api/skin-api/avatars/face/{user_id or nickname}`

POST `/api/skins/update_skin`

The POST route require 2 parameters :
`{ "access_token" : "XXXX", "skin" : "IMAGE.PNG" }

The user, if connected, can update his skin if he navigates to `/skin-api`

### Player skins via Azlink

With Azlink, in the config.yml, you can set the `skinrestorer-integration` to `true` to automatically apply player's skins

### Player skins via KataSkinApi (SkinRestorer)
You can also use the plugin [https://www.spigotmc.org/resources/kataskinapi.110210/](https://www.spigotmc.org/resources/kataskinapi.110210/) 
to automatically apply player's skins **if you are not using Azlink.**
