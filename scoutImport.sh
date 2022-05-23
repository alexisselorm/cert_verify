php artisan scout:import "App\Models\Students"
php artisan scout:import "App\Models\Program"
php artisan scout:import "App\Models\Program_Type"
php artisan scout:import "App\Models\Program_RunType"

curl   -X POST 'http://localhost:7700/indexes/students/settings/searchable-attributes'   -H 'Content-type:application/json'   --data-binary '[
        "cert_no"
  ]'
curl   -X POST 'http://localhost:7700/indexes/students/settings/filterable-attributes'   -H 'Content-type:application/json'   --data-binary '[
        "cert_no",
        "program_id"
  ]'
