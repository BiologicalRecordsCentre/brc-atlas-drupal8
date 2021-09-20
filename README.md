### BRC Atlas Drupal 8/9 module
This simple Drupal 8.8/9 module packages the BRC Atlas Javascript library (https://github.com/BiologicalRecordsCentre/brc-atlas) and that libraries' dependencies (Leaflet and D3), making them available in a Drupal library asset - brc_atlas/atlas.

The module aslo looks for any javascript files placed in the ./libraries/brcatlas folder and, if it finds any, adds these to another Drupal asset library - brc_atlas/access.

The module loads these assets on any page, of any content type, where the alias for the page includes the following string '-atlas-'.

The module also provides a custom boolean field (called *BRC Atlas library*), which can be added to any content type. Nodes of any content type (that include this field) can use it to indicate if the assets should be loaded (regardless of page alias).

The module adds some code that allows content creators to generate a map in body text by simply including a div tag with the class `atlasdrupal` and some `data-` attributes that direct the BRC Atlas JS library to generate a map.

TODO: comprehensive instructions and examples.

