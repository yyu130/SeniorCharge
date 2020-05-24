# Charging Station Database

| **Column Name** | **Definition** |
| --- | --- |
| station\_name | Name of the Establishment |
| longitude | Longitude of the Establishment |
| latitude | Latitude of the Establishment |
| address | Suburb of Establishment |
| suburb | Full address Establishment |
| postcode | Post code of Establishment |
| if\_charger\_working | Yes (1) or No (0); To be used in the future to hide or show a charging station |
| usb\_a | Yes (1) or No (0); Display name: USB A (iPhone) |
| usb\_c | Yes (1) or No (0); Display name: USB C (Samsung,One-Plus, Nexus) |
| micro\_usb | Yes (1) or No (0); Display name: Micro USB (Samsung, Android) |
| plug\_only | Yes (1) or No (0); Display name: Plug only, bring your own charger |
| establishment\_type | Valid Values:<br> -Community Centre<br> -Community SpaceHousing Support Services<br>-Library<br>-Other Support Services<br>-Train Station<br>-Restaurant<br><br>Additional definitions available below |
| if\_wifi | Yes (1) or No (0) |
| if\_bathroom | Yes (1), No (0), Unknown (2)<br><br>Yes covers the availability of Toilets/Showers |
| access\_type | Accessibility level as defined in https://www.melbourne.vic.gov.au/sitecollectiondocuments/clue-definitions.pdf <br><br>Valid Values:<br> -Main entrance is step free or with ramps<br> -Entrance(s) have limited access via a small lip or a steep ramp, but alternative access available<br> -All entrances have steps<br> -Not determined |
| other\_amenities | Text format that shows additional description for what the charging station offers |
| star\_rating | Average Star Rating of a Charging Station based on the Reviews |
| mon\_open | Time of opening for the day of the week in 48 hr format |
| mon\_close | Time of opening for the day of the week in 48 hr format |
| tue\_open | Time of opening for the day of the week in 48 hr format |
| tue\_close | Time of opening for the day of the week in 48 hr format |
| wed\_open | Time of opening for the day of the week in 48 hr format |
| wed\_close | Time of opening for the day of the week in 48 hr format |
| thu\_open | Time of opening for the day of the week in 48 hr format |
| thu\_close | Time of opening for the day of the week in 48 hr format |
| fri\_open | Time of opening for the day of the week in 48 hr format |
| fri\_close | Time of opening for the day of the week in 48 hr format |
| sat\_open | Time of opening for the day of the week in 48 hr format |
| sat\_close | Time of opening for the day of the week in 48 hr format |
| sun\_open | Time of opening for the day of the week in 48 hr format |
| sun\_close | Time of opening for the day of the week in 48 hr format |
| if\_24h | Yes (1) or No (0) |

# Establishment Type Definitions

| **Establishment Type** | **Description** |
| --- | --- |
| Community Centre | Provides social welfare services and community activities |
| Community Space | Spaces for public use (with or without booking) that are not libraries |
| Housing Support Services | Provides support services for the homeless |
| Library | Library as recorgnized by the government of Victoria and Melbourne City |
| Train Station | Train Stations within Melbourne |
| Other Support Services | Counselling services, free food services, all other free services not defined |

# Additional Accessibility Definitions

| **Accessibility Short Name** | **Description/Display Name** |
| --- | --- |
| High level of accessibility | Main entrance is step free or with ramps |
| Moderate level of accessibility | Entrance(s) have limited access via a small lip or a steep ramp, but alternative access available |
| Low level of accessibility | All entrances have steps |
| Not determined or not applicable | Not determined |
