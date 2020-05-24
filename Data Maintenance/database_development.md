# Database Development

These are the steps on analysing and aggregating the collected data to be able to build the Charging Station Database that is the primary database used in the website.

1. Define Charging Station database fields and the valid values for each field
  + Data Dictionary was created to avoid incorrect interpretation of data used in the website
  + The Data Dictionary will also be the reference document in the Data Maintenance Phase
2. Open data from the government and data from not-for-profit organisation will be collected first, to be followed by commercial establishment related data
3. Conduct data exploration and analysis for each data source
  + Determine the data source size and complexity to identify if the environment for data exploration/analysis
    - MS Excel for small and straightforward data
    - Python for medium to larger complex data
  + If a data source is not a csv downloadable file, convert the data sources into a data table
  + Identify fields available for each data source that is aligned with the charging Station data fields
4. Conduct data cleansing
  + Determine filter rules for each field to be able to include relevant data into the Charging station database
  + Validate if the locations data are correct using reverse geocoding and normal geocoding method
5. Fill missing data
  + Retrieve missing location using reverse geocoding and normal geocoding methods
  + Apply rules on populating missing location data
    - The open data from the gov&#39;t is always assumed correct for longitude, latitude and full address
    - Geocoding results are always selected for postcode and suburb data as its data were more
6. Map the columns of the cleansed data into the Charging Station data table
7. Visualise the data to determine any data outliers/errors and fix them
