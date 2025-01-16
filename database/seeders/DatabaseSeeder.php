<?php

namespace Database\Seeders;

use App\Models\Barangay;
use App\Models\Designation;
use App\Models\District;
use App\Models\Municipality;
use App\Models\Organization;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create(
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'Super Admin'
            ]
        );


        // Districts
        $districts = [
            ['name' => '1st District'],
            ['name' => '2nd District']
        ];

        foreach ($districts as $district) {
            District::create($district);
        }


        // Municipalitites
        $municipalities = [
            ['name' => 'San Fernando', 'district_id' => 1],
            ['name' => 'Agoo', 'district_id' => 1],
            ['name' => 'Aringay', 'district_id' => 1],
            ['name' => 'Bacnotan', 'district_id' => 1],
            ['name' => 'Bagulin', 'district_id' => 1],
            ['name' => 'Balaoan', 'district_id' => 1],
            ['name' => 'Bangar', 'district_id' => 1],
            ['name' => 'Bauang', 'district_id' => 1],
            ['name' => 'Burgos', 'district_id' => 1],
            ['name' => 'Caba', 'district_id' => 1],
            ['name' => 'Luna', 'district_id' => 1],
            ['name' => 'Naguilian', 'district_id' => 1],
            ['name' => 'Pugo', 'district_id' => 1],
            ['name' => 'Rosario', 'district_id' => 1],
            ['name' => 'San Gabriel', 'district_id' => 1],
            ['name' => 'San Juan', 'district_id' => 1],
            ['name' => 'Santol', 'district_id' => 1],
            ['name' => 'Sto. Tomas', 'district_id' => 1],
            ['name' => 'Sudipen', 'district_id' => 1],
            ['name' => 'Tubao', 'district_id' => 1],
        ];

        foreach ($municipalities as $municipality) {
            Municipality::create($municipality);
        }

        $this->populateBarangay();
    }

    public function populateBarangay()
    {
        $barangays = [
            // San Fernando
            ['name' => 'Abut', 'municipality_id' => 1],
            ['name' => 'Apaleng', 'municipality_id' => 1],
            ['name' => 'Bacsil', 'municipality_id' => 1],
            ['name' => 'Bangbangolan', 'municipality_id' => 1],
            ['name' => 'Bangcusay', 'municipality_id' => 1],
            ['name' => 'Barangay I (Poblacion)', 'municipality_id' => 1],
            ['name' => 'Barangay II (Poblacion)', 'municipality_id' => 1],
            ['name' => 'Barangay III (Poblacion)', 'municipality_id' => 1],
            ['name' => 'Barangay IV (Poblacion)', 'municipality_id' => 1],
            ['name' => 'Baraoas', 'municipality_id' => 1],
            ['name' => 'Bato', 'municipality_id' => 1],
            ['name' => 'Biday', 'municipality_id' => 1],
            ['name' => 'Birunget', 'municipality_id' => 1],
            ['name' => 'Bungro', 'municipality_id' => 1],
            ['name' => 'Cabaroan (Negro)', 'municipality_id' => 1],
            ['name' => 'Cabarsican', 'municipality_id' => 1],
            ['name' => 'Cadaclan', 'municipality_id' => 1],
            ['name' => 'Calabugao', 'municipality_id' => 1],
            ['name' => 'Camansi', 'municipality_id' => 1],
            ['name' => 'Canaoay', 'municipality_id' => 1],
            ['name' => 'Carlatan', 'municipality_id' => 1],
            ['name' => 'Catbangen', 'municipality_id' => 1],
            ['name' => 'Dallangayan Este', 'municipality_id' => 1],
            ['name' => 'Dallangayan Oeste', 'municipality_id' => 1],
            ['name' => 'Dalumpinas Este', 'municipality_id' => 1],
            ['name' => 'Dalumpinas Oeste', 'municipality_id' => 1],
            ['name' => 'Ilocanos Norte', 'municipality_id' => 1],
            ['name' => 'Ilocanos Sur', 'municipality_id' => 1],
            ['name' => 'Langcuas', 'municipality_id' => 1],
            ['name' => 'Lingsat', 'municipality_id' => 1],
            ['name' => 'Madayegdeg', 'municipality_id' => 1],
            ['name' => 'Nagyubuyuban', 'municipality_id' => 1],
            ['name' => 'Pagdaraoan', 'municipality_id' => 1],
            ['name' => 'Pao Norte', 'municipality_id' => 1],
            ['name' => 'Pao Sur', 'municipality_id' => 1],
            ['name' => 'Parian', 'municipality_id' => 1],
            ['name' => 'Pias', 'municipality_id' => 1],
            ['name' => 'Poro', 'municipality_id' => 1],
            ['name' => 'San Agustin', 'municipality_id' => 1],
            ['name' => 'Santiago Norte', 'municipality_id' => 1],
            ['name' => 'Santiago Sur', 'municipality_id' => 1],
            ['name' => 'Saoay', 'municipality_id' => 1],
            ['name' => 'Sibuan-Otong', 'municipality_id' => 1],
            ['name' => 'Sinapangan', 'municipality_id' => 1],
            ['name' => 'Tanqui', 'municipality_id' => 1],
            ['name' => 'Tanulong', 'municipality_id' => 1],
            ['name' => 'Tongotong', 'municipality_id' => 1],
            ['name' => 'Pagudpud', 'municipality_id' => 1],
            ['name' => 'Masicong', 'municipality_id' => 1],
            ['name' => 'Bacsil North', 'municipality_id' => 1],
            ['name' => 'Bacsil South', 'municipality_id' => 1],
            ['name' => 'Baraoas Norte', 'municipality_id' => 1],
            ['name' => 'Baraoas Sur', 'municipality_id' => 1],
            ['name' => 'Dallangayan Norte', 'municipality_id' => 1],
            ['name' => 'Dallangayan Sur', 'municipality_id' => 1],
            ['name' => 'Dalumpinas Norte', 'municipality_id' => 1],
            ['name' => 'Dalumpinas Sur', 'municipality_id' => 1],
            // Agoo
            ['name' => 'Ambitacay', 'municipality_id' => 2],
            ['name' => 'Balawarte', 'municipality_id' => 2],
            ['name' => 'Capas', 'municipality_id' => 2],
            ['name' => 'Consolacion (Poblacion)', 'municipality_id' => 2],
            ['name' => 'Macalva Central', 'municipality_id' => 2],
            ['name' => 'Macalva Norte', 'municipality_id' => 2],
            ['name' => 'Macalva Sur', 'municipality_id' => 2],
            ['name' => 'Nazareno', 'municipality_id' => 2],
            ['name' => 'Purok', 'municipality_id' => 2],
            ['name' => 'San Agustin East', 'municipality_id' => 2],
            ['name' => 'San Agustin Norte', 'municipality_id' => 2],
            ['name' => 'San Agustin Sur', 'municipality_id' => 2],
            ['name' => 'San Antonino', 'municipality_id' => 2],
            ['name' => 'San Antonio', 'municipality_id' => 2],
            ['name' => 'San Francisco', 'municipality_id' => 2],
            ['name' => 'San Isidro', 'municipality_id' => 2],
            ['name' => 'San Joaquin Norte', 'municipality_id' => 2],
            ['name' => 'San Joaquin Sur', 'municipality_id' => 2],
            ['name' => 'San Jose Norte', 'municipality_id' => 2],
            ['name' => 'San Jose Sur', 'municipality_id' => 2],
            ['name' => 'San Juan', 'municipality_id' => 2],
            ['name' => 'San Julian Central', 'municipality_id' => 2],
            ['name' => 'San Julian East', 'municipality_id' => 2],
            ['name' => 'San Julian Norte', 'municipality_id' => 2],
            ['name' => 'San Julian West', 'municipality_id' => 2],
            ['name' => 'San Manuel Norte', 'municipality_id' => 2],
            ['name' => 'San Manuel Sur', 'municipality_id' => 2],
            ['name' => 'San Marcos', 'municipality_id' => 2],
            ['name' => 'San Miguel', 'municipality_id' => 2],
            ['name' => 'San Nicolas Central (Poblacion)', 'municipality_id' => 2],
            ['name' => 'San Nicolas East', 'municipality_id' => 2],
            ['name' => 'San Nicolas Norte (Poblacion)', 'municipality_id' => 2],
            ['name' => 'San Nicolas Sur (Poblacion)', 'municipality_id' => 2],
            ['name' => 'San Nicolas West', 'municipality_id' => 2],
            ['name' => 'San Pedro', 'municipality_id' => 2],
            ['name' => 'San Roque East', 'municipality_id' => 2],
            ['name' => 'San Roque West', 'municipality_id' => 2],
            ['name' => 'San Vicente Norte', 'municipality_id' => 2],
            ['name' => 'San Vicente Sur', 'municipality_id' => 2],
            ['name' => 'Santa Ana', 'municipality_id' => 2],
            ['name' => 'Santa Barbara (Poblacion)', 'municipality_id' => 2],
            ['name' => 'Santa Fe', 'municipality_id' => 2],
            ['name' => 'Santa Maria', 'municipality_id' => 2],
            ['name' => 'Santa Monica', 'municipality_id' => 2],
            ['name' => 'Santa Rita (Nalinac)', 'municipality_id' => 2],
            ['name' => 'Santa Rita East', 'municipality_id' => 2],
            ['name' => 'Santa Rita Norte', 'municipality_id' => 2],
            ['name' => 'Santa Rita Sur', 'municipality_id' => 2],
            ['name' => 'Santa Rita West', 'municipality_id' => 2],
            // Aringay
            ['name' => 'Alcala', 'municipality_id' => 3],
            ['name' => 'Dulao', 'municipality_id' => 3],
            ['name' => 'Gallano', 'municipality_id' => 3],
            ['name' => 'Macabato', 'municipality_id' => 3],
            ['name' => 'Poblacion', 'municipality_id' => 3],
            ['name' => 'Samara', 'municipality_id' => 3],
            ['name' => 'San Antonio', 'municipality_id' => 3],
            ['name' => 'San Benito', 'municipality_id' => 3],
            ['name' => 'San Eugenio', 'municipality_id' => 3],
            ['name' => 'San Jose', 'municipality_id' => 3],
            ['name' => 'San Juan', 'municipality_id' => 3],
            ['name' => 'San Simon', 'municipality_id' => 3],
            ['name' => 'Santa Lucia', 'municipality_id' => 3],
            ['name' => 'Santa Rita East', 'municipality_id' => 3],
            ['name' => 'Santa Rita West', 'municipality_id' => 3],
            ['name' => 'Santo Rosario', 'municipality_id' => 3],
            // Bacnotan
            ['name' => 'Bacnotan East', 'municipality_id' => 4],
            ['name' => 'Bacnotan West', 'municipality_id' => 4],
            ['name' => 'Bago', 'municipality_id' => 4],
            ['name' => 'Barangay I (Poblacion)', 'municipality_id' => 4],
            ['name' => 'Barangay II (Poblacion)', 'municipality_id' => 4],
            ['name' => 'Barangay III (Poblacion)', 'municipality_id' => 4],
            ['name' => 'Barangay IV (Poblacion)', 'municipality_id' => 4],
            ['name' => 'Barangay V (Poblacion)', 'municipality_id' => 4],
            ['name' => 'Daya', 'municipality_id' => 4],
            ['name' => 'Dolores', 'municipality_id' => 4],
            ['name' => 'Inerangan', 'municipality_id' => 4],
            ['name' => 'Luna', 'municipality_id' => 4],
            ['name' => 'Longos', 'municipality_id' => 4],
            ['name' => 'Ona', 'municipality_id' => 4],
            ['name' => 'Pobla', 'municipality_id' => 4],
            ['name' => 'Santa Rita East', 'municipality_id' => 4],
            ['name' => 'Santa Rita West', 'municipality_id' => 4],
            // Bagulin
            ['name' => 'Bagulin', 'municipality_id' => 5],
            ['name' => 'San Jose', 'municipality_id' => 5],
            ['name' => 'San Juan', 'municipality_id' => 5],
            ['name' => 'Santa Rita East', 'municipality_id' => 5],
            ['name' => 'Santa Rita West', 'municipality_id' => 5],
            ['name' => 'Santo Niño', 'municipality_id' => 5],
            ['name' => 'San Pedro', 'municipality_id' => 5],
            ['name' => 'San Vicente', 'municipality_id' => 5],
            ['name' => 'Villarica', 'municipality_id' => 5],
            // Balaoan
            ['name' => 'Bacnotan', 'municipality_id' => 6],
            ['name' => 'Bangui', 'municipality_id' => 6],
            ['name' => 'Barangay I (Poblacion)', 'municipality_id' => 6],
            ['name' => 'Barangay II (Poblacion)', 'municipality_id' => 6],
            ['name' => 'Barangay III (Poblacion)', 'municipality_id' => 6],
            ['name' => 'Barangay IV (Poblacion)', 'municipality_id' => 6],
            ['name' => 'Barangay V (Poblacion)', 'municipality_id' => 6],
            ['name' => 'Billa', 'municipality_id' => 6],
            ['name' => 'Canduyong', 'municipality_id' => 6],
            ['name' => 'Carisquis', 'municipality_id' => 6],
            ['name' => 'Dulao', 'municipality_id' => 6],
            ['name' => 'Luna', 'municipality_id' => 6],
            ['name' => 'San Juan', 'municipality_id' => 6],
            ['name' => 'San Pedro', 'municipality_id' => 6],
            ['name' => 'Santa Rita East', 'municipality_id' => 6],
            ['name' => 'Santa Rita West', 'municipality_id' => 6],
            // Bangar
            ['name' => 'Bagumbayan', 'municipality_id' => 7],
            ['name' => 'Barangay I (Poblacion)', 'municipality_id' => 7],
            ['name' => 'Barangay II (Poblacion)', 'municipality_id' => 7],
            ['name' => 'Bicbica', 'municipality_id' => 7],
            ['name' => 'Bumangabang', 'municipality_id' => 7],
            ['name' => 'Capangpangan', 'municipality_id' => 7],
            ['name' => 'Lingsat', 'municipality_id' => 7],
            ['name' => 'Lunas', 'municipality_id' => 7],
            ['name' => 'Malingmaling', 'municipality_id' => 7],
            ['name' => 'Namilla', 'municipality_id' => 7],
            ['name' => 'Pagsanhan', 'municipality_id' => 7],
            ['name' => 'Santa Rita East', 'municipality_id' => 7],
            ['name' => 'Santa Rita West', 'municipality_id' => 7], // as per your request
            ['name' => 'Santo Tomas', 'municipality_id' => 7],
            ['name' => 'Suso', 'municipality_id' => 7],
            ['name' => 'Tawid', 'municipality_id' => 7],
            // Bauang
            ['name' => 'Bacnotan', 'municipality_id' => 8],
            ['name' => 'Bangket', 'municipality_id' => 8],
            ['name' => 'Banawel', 'municipality_id' => 8],
            ['name' => 'Bayanihan', 'municipality_id' => 8],
            ['name' => 'Caba', 'municipality_id' => 8],
            ['name' => 'Cayanga', 'municipality_id' => 8],
            ['name' => 'Dilibang', 'municipality_id' => 8],
            ['name' => 'Dolores', 'municipality_id' => 8],
            ['name' => 'Lambayong', 'municipality_id' => 8],
            ['name' => 'Luyag', 'municipality_id' => 8],
            ['name' => 'Malacañang', 'municipality_id' => 8],
            ['name' => 'Malibay', 'municipality_id' => 8],
            ['name' => 'Nagtupacan', 'municipality_id' => 8],
            ['name' => 'San Pablo', 'municipality_id' => 8],
            ['name' => 'Santa Rita West', 'municipality_id' => 8],
            ['name' => 'Santo Niño', 'municipality_id' => 8],
            ['name' => 'Santa Rita East', 'municipality_id' => 8],
            // Burgos
            ['name' => 'Agno', 'municipality_id' => 9],
            ['name' => 'Bacnotan', 'municipality_id' => 9],
            ['name' => 'Balao', 'municipality_id' => 9],
            ['name' => 'Balitoc', 'municipality_id' => 9],
            ['name' => 'Bungro', 'municipality_id' => 9],
            ['name' => 'Carisquis', 'municipality_id' => 9],
            ['name' => 'Damortis', 'municipality_id' => 9],
            ['name' => 'Nagsabaran', 'municipality_id' => 9],
            ['name' => 'Santa Rita East', 'municipality_id' => 9],
            ['name' => 'Santa Rita West', 'municipality_id' => 9],
            ['name' => 'Santo Tomas', 'municipality_id' => 9],
            ['name' => 'Sangbay', 'municipality_id' => 9],
            ['name' => 'Burgos', 'municipality_id' => 9],
            // Caba
            ['name' => 'Bangbang', 'municipality_id' => 10],
            ['name' => 'Bato', 'municipality_id' => 10],
            ['name' => 'Basilio', 'municipality_id' => 10],
            ['name' => 'Binabay', 'municipality_id' => 10],
            ['name' => 'Bulong', 'municipality_id' => 10],
            ['name' => 'Burgos', 'municipality_id' => 10],
            ['name' => 'Cabayang', 'municipality_id' => 10],
            ['name' => 'Caba', 'municipality_id' => 10],
            ['name' => 'Cansuso', 'municipality_id' => 10],
            ['name' => 'Canturay', 'municipality_id' => 10],
            ['name' => 'Concepcion', 'municipality_id' => 10],
            ['name' => 'Lanteng', 'municipality_id' => 10],
            ['name' => 'Lepanto', 'municipality_id' => 10],
            ['name' => 'Madalungon', 'municipality_id' => 10],
            ['name' => 'Magsaysay', 'municipality_id' => 10],
            ['name' => 'Malagob', 'municipality_id' => 10],
            ['name' => 'Namnama', 'municipality_id' => 10],
            ['name' => 'Nangalisan', 'municipality_id' => 10],
            ['name' => 'Pagsanghan', 'municipality_id' => 10],
            ['name' => 'Paoay', 'municipality_id' => 10],
            ['name' => 'San Isidro', 'municipality_id' => 10],
            ['name' => 'Santa Rita West', 'municipality_id' => 10],
            ['name' => 'Santa Rita East', 'municipality_id' => 10],
            ['name' => 'Santiago', 'municipality_id' => 10],
            // Luna
            ['name' => 'Santa Rita West', 'municipality_id' => 11],
            ['name' => 'Santa Rita East', 'municipality_id' => 11],
            ['name' => 'Dulao', 'municipality_id' => 11],
            ['name' => 'Pangil', 'municipality_id' => 11],
            ['name' => 'Bancao', 'municipality_id' => 11],
            ['name' => 'Ballasag', 'municipality_id' => 11],
            ['name' => 'Bilog', 'municipality_id' => 11],
            ['name' => 'Concepcion', 'municipality_id' => 11],
            ['name' => 'Longos', 'municipality_id' => 11],
            ['name' => 'San Marcos', 'municipality_id' => 11],
            ['name' => 'Tanque', 'municipality_id' => 11],
            ['name' => 'Bacnotan', 'municipality_id' => 11],
            ['name' => 'Hagohoy', 'municipality_id' => 11],
            ['name' => 'Santiago', 'municipality_id' => 11],
            ['name' => 'Rizal', 'municipality_id' => 11],
            // Naguilian
            ['name' => 'Alitaya', 'municipality_id' => 12],
            ['name' => 'Ambarbeng', 'municipality_id' => 12],
            ['name' => 'Bagbag', 'municipality_id' => 12],
            ['name' => 'Bical', 'municipality_id' => 12],
            ['name' => 'Bilangbilangan Norte', 'municipality_id' => 12],
            ['name' => 'Bilangbilangan Sur', 'municipality_id' => 12],
            ['name' => 'Calumbuyan', 'municipality_id' => 12],
            ['name' => 'Cabaruan', 'municipality_id' => 12],
            ['name' => 'Carisquis', 'municipality_id' => 12],
            ['name' => 'Catbangen', 'municipality_id' => 12],
            ['name' => 'Concepcion', 'municipality_id' => 12],
            ['name' => 'Darao', 'municipality_id' => 12],
            ['name' => 'La Union', 'municipality_id' => 12],
            ['name' => 'Lunas', 'municipality_id' => 12],
            ['name' => 'Minanga', 'municipality_id' => 12],
            ['name' => 'Panglao', 'municipality_id' => 12],
            ['name' => 'San Antonio', 'municipality_id' => 12],
            ['name' => 'San Isidro', 'municipality_id' => 12],
            ['name' => 'San Juan', 'municipality_id' => 12],
            ['name' => 'San Luis', 'municipality_id' => 12],
            ['name' => 'Santa Rita East', 'municipality_id' => 12],
            ['name' => 'Santa Rita West', 'municipality_id' => 12],
            ['name' => 'Santo Niño', 'municipality_id' => 12],
            ['name' => 'Santiago', 'municipality_id' => 12],
            ['name' => 'Suyo', 'municipality_id' => 12],
            // Pugo
            ['name' => 'Baldin', 'municipality_id' => 13],
            ['name' => 'Baringcatan', 'municipality_id' => 13],
            ['name' => 'Baroro', 'municipality_id' => 13],
            ['name' => 'Batioc', 'municipality_id' => 13],
            ['name' => 'Bimmangol', 'municipality_id' => 13],
            ['name' => 'Binaclutan', 'municipality_id' => 13],
            ['name' => 'Bungro', 'municipality_id' => 13],
            ['name' => 'Caba', 'municipality_id' => 13],
            ['name' => 'Capitangan', 'municipality_id' => 13],
            ['name' => 'Damar', 'municipality_id' => 13],
            ['name' => 'La Union', 'municipality_id' => 13],
            ['name' => 'Lablab', 'municipality_id' => 13],
            ['name' => 'Linao', 'municipality_id' => 13],
            ['name' => 'Lucbuan', 'municipality_id' => 13],
            ['name' => 'Pugad', 'municipality_id' => 13],
            ['name' => 'Santa Rita East', 'municipality_id' => 13],
            ['name' => 'Santa Rita West', 'municipality_id' => 13],
            ['name' => 'San Vicente', 'municipality_id' => 13],
            ['name' => 'San Esteban', 'municipality_id' => 13],
            // Rosario
            ['name' => 'Agpao', 'municipality_id' => 14],
            ['name' => 'Alina', 'municipality_id' => 14],
            ['name' => 'Banaoang', 'municipality_id' => 14],
            ['name' => 'Bato', 'municipality_id' => 14],
            ['name' => 'Bato Oeste', 'municipality_id' => 14],
            ['name' => 'Bilaran', 'municipality_id' => 14],
            ['name' => 'Catbangen', 'municipality_id' => 14],
            ['name' => 'Ili Norte', 'municipality_id' => 14],
            ['name' => 'Ili Sur', 'municipality_id' => 14],
            ['name' => 'Lingsat', 'municipality_id' => 14],
            ['name' => 'Pao', 'municipality_id' => 14],
            ['name' => 'Poblacion East', 'municipality_id' => 14],
            ['name' => 'Poblacion West', 'municipality_id' => 14],
            ['name' => 'Quinale', 'municipality_id' => 14],
            ['name' => 'San Francisco', 'municipality_id' => 14],
            ['name' => 'San Isidro', 'municipality_id' => 14],
            ['name' => 'San Juan', 'municipality_id' => 14],
            ['name' => 'Santa Rita East', 'municipality_id' => 14],
            ['name' => 'Santa Rita West', 'municipality_id' => 14],
            ['name' => 'Santo Niño', 'municipality_id' => 14],
            ['name' => 'Santiago', 'municipality_id' => 14],
            ['name' => 'Silag', 'municipality_id' => 14],

            // San Gabriel
            ['name' => 'Balinbangaan', 'municipality_id' => 15],
            ['name' => 'Bantay', 'municipality_id' => 15],
            ['name' => 'Bauer', 'municipality_id' => 15],
            ['name' => 'Cabayangan', 'municipality_id' => 15],
            ['name' => 'Cacapayan', 'municipality_id' => 15],
            ['name' => 'Calabigan', 'municipality_id' => 15],
            ['name' => 'Dammang', 'municipality_id' => 15],
            ['name' => 'Doyo', 'municipality_id' => 15],
            ['name' => 'Larao', 'municipality_id' => 15],
            ['name' => 'Libsong', 'municipality_id' => 15],
            ['name' => 'Luna', 'municipality_id' => 15],
            ['name' => 'Poblacion', 'municipality_id' => 15],
            ['name' => 'San Vicente', 'municipality_id' => 15],
            ['name' => 'Santa Rita East', 'municipality_id' => 15],
            ['name' => 'Santa Rita West', 'municipality_id' => 15],
            ['name' => 'Santo Niño', 'municipality_id' => 15],
            ['name' => 'Ubbog', 'municipality_id' => 15],

            // San Juan
            ['name' => 'Bani', 'municipality_id' => 16],
            ['name' => 'Carino', 'municipality_id' => 16],
            ['name' => 'Consuelo', 'municipality_id' => 16],
            ['name' => 'Darao', 'municipality_id' => 16],
            ['name' => 'Duglaan', 'municipality_id' => 16],
            ['name' => 'Poblacion', 'municipality_id' => 16],
            ['name' => 'San Agustin', 'municipality_id' => 16],
            ['name' => 'San Antonio', 'municipality_id' => 16],
            ['name' => 'San Gabriel', 'municipality_id' => 16],
            ['name' => 'San Isidro', 'municipality_id' => 16],
            ['name' => 'San Juan', 'municipality_id' => 16],
            ['name' => 'Santa Rita East', 'municipality_id' => 16],
            ['name' => 'Santa Rita West', 'municipality_id' => 16],
            ['name' => 'Santiago', 'municipality_id' => 16],
            ['name' => 'Santo Tomas', 'municipality_id' => 16],
            ['name' => 'Tubo', 'municipality_id' => 16],

            // Santol
            ['name' => 'Santa Rita East', 'municipality_id' => 17],
            ['name' => 'Santa Rita West', 'municipality_id' => 17],
            ['name' => 'Longlong', 'municipality_id' => 17],
            ['name' => 'Poblacion', 'municipality_id' => 17],
            ['name' => 'San Benito', 'municipality_id' => 17],
            ['name' => 'San Isidro', 'municipality_id' => 17],
            ['name' => 'San Jose', 'municipality_id' => 17],
            ['name' => 'San Juan', 'municipality_id' => 17],
            ['name' => 'San Pablo', 'municipality_id' => 17],
            ['name' => 'San Pedro', 'municipality_id' => 17],
            ['name' => 'San Vicente', 'municipality_id' => 17],
            ['name' => 'Santo Tomas', 'municipality_id' => 17],

            // Sto Tomas
            ['name' => 'Santa Rita West', 'municipality_id' => 18],
            ['name' => 'Santa Rita East', 'municipality_id' => 18],
            ['name' => 'Bacnotan Norte', 'municipality_id' => 18],
            ['name' => 'Bacnotan Sur', 'municipality_id' => 18],
            ['name' => 'Cateng', 'municipality_id' => 18],
            ['name' => 'Cabisil', 'municipality_id' => 18],
            ['name' => 'Banaoang', 'municipality_id' => 18],
            ['name' => 'Poblacion', 'municipality_id' => 18],
            ['name' => 'San Isidro', 'municipality_id' => 18],
            ['name' => 'San Vicente', 'municipality_id' => 18],
            ['name' => 'San Agustin', 'municipality_id' => 18],
            ['name' => 'Bangcusay', 'municipality_id' => 18],
            ['name' => 'Dulac', 'municipality_id' => 18],

            // Sidupen
            ['name' => 'Santa Rita West', 'municipality_id' => 19],
            ['name' => 'Santa Rita East', 'municipality_id' => 19],
            ['name' => 'Poblacion Norte', 'municipality_id' => 19],
            ['name' => 'Poblacion Sur', 'municipality_id' => 19],
            ['name' => 'San Isidro', 'municipality_id' => 19],
            ['name' => 'San Juan', 'municipality_id' => 19],
            ['name' => 'Bacsil', 'municipality_id' => 19],
            ['name' => 'Bacungan', 'municipality_id' => 19],
            ['name' => 'Ili Norte', 'municipality_id' => 19],
            ['name' => 'Ili Sur', 'municipality_id' => 19],
            ['name' => 'Tagpo', 'municipality_id' => 19],
            ['name' => 'San Antonio', 'municipality_id' => 19],
            ['name' => 'San Lorenzo', 'municipality_id' => 19],
            ['name' => 'San Mateo', 'municipality_id' => 19],
            ['name' => 'San Vicente', 'municipality_id' => 19],
            ['name' => 'Rang-ay', 'municipality_id' => 19],

            // Tubao
            ['name' => 'Bacsil', 'municipality_id' => 20],
            ['name' => 'Bantayan', 'municipality_id' => 20],
            ['name' => 'Barbantayan', 'municipality_id' => 20],
            ['name' => 'Bangay', 'municipality_id' => 20],
            ['name' => 'Basilan', 'municipality_id' => 20],
            ['name' => 'Cabaroan', 'municipality_id' => 20],
            ['name' => 'Catbangen', 'municipality_id' => 20],
            ['name' => 'Longlong', 'municipality_id' => 20],
            ['name' => 'Macalaje', 'municipality_id' => 20],
            ['name' => 'Poblacion', 'municipality_id' => 20],
            ['name' => 'San Antonio', 'municipality_id' => 20],
            ['name' => 'San Gabriel', 'municipality_id' => 20],
            ['name' => 'San Juan', 'municipality_id' => 20],
            ['name' => 'San Vicente', 'municipality_id' => 20],
            ['name' => 'Santa Rita East', 'municipality_id' => 20],
            ['name' => 'Santa Rita West', 'municipality_id' => 20],
            ['name' => 'Santo Niño', 'municipality_id' => 20],

        ];

        foreach ($barangays as $barangay) {
            Barangay::create($barangay);
        }
    }
}
