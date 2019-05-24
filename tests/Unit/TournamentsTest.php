<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Tournaments;
use App\Establecimiento;
use App\Deporte;
use DB;


class TournamentsTest extends TestCase
{
    use RefreshDatabase;
    /**
     *
     *
     * @test
     */
    public function testGetAllTournamentsVip()
    {
        factory(Tournaments::class,1)->create([
            'name' => 'Torneo Hospitalet',
            'prioridad' => 1
        ]);
        $this->assertDatabaseHas('tournaments',[
            'name' => 'Torneo Hospitalet' 
        ]);
        $tournamentsVip = Tournaments::getAllTournamentsVip();
        foreach ($tournamentsVip as $tourny) {
            $this->assertTrue($tourny->prioridad == 1);
        }
    }
    
    /**
     *
     *
     * @test
     */
    public function testFindTournaments()
    {
        $dateArray = getDate();
        $day = $dateArray['mday'];
        $month = $dateArray['mon'];
        $year = $dateArray['year'];
        $date = date_create("$year-$month-$day");
        $fakeTourny = factory(Tournaments::class,1)->create([
            'name' => 'Torneo Hospitalet',
            'id_club' => 222222,
            'prioridad' => 1,
            'genero' => 'masculino',
            'id_deporte' => 22,
            'fecha' => $date
        ]);
        $fakeClub = factory(Establecimiento::class,1)->create([
            'id' => 222222,
            'nombre' => 'Club Hospitalet',
            'direccion' => 'Hospitalet',
        ]);
        $fakeSport = factory(Deporte::class,1)->create([
            'id' => 22,
            'nombre' => 'Beisbol'
        ]);
        $tournamentsSearched = Tournaments::findTournaments($fakeClub[0]->direccion,$fakeTourny[0]->genero,$fakeSport[0]->id,$date);
        $this->assertTrue($tournamentsSearched[0]->name == 'Torneo Hospitalet');
    }

    /**
     *
     *
     * @test
     */
    public function testIncrementParticipantsInATournament()
    {
        $fakeTourny = factory(Tournaments::class,1)->create([
            'id' => 999999,
            'num_participantes_max' => 90
        ]);
        Tournaments::IncrementParticipantsInATournament($fakeTourny[0]->id,30);
        $this->assertDatabaseHas('tournaments',[
            'id' => 999999,
            'num_participantes_actual' => 30 
        ]);
        Tournaments::IncrementParticipantsInATournament($fakeTourny[0]->id,30);
        $this->assertDatabaseHas('tournaments',[
            'id' => 999999,
            'num_participantes_actual' => 60
        ]);
    }

    /**
     *
     *
     * @test
     */
    public function testSignUpForATournament()
    {
        $fakeTourny = factory(Tournaments::class,1)->create([
            'id' => 999999,
            'num_participantes_max' => 90
        ]);
        Tournaments::IncrementParticipantsInATournament($fakeTourny[0]->id,30);
        Tournaments::signUpForATournament($fakeTourny[0]->id,30,99);
        $this->assertDatabaseHas('reserva_tournament',[
            'id_tournament' => 999999,
            'id_usuario' => 99,
            'num_inscripciones' => 30
        ]);
    }

    /**
     *
     *
     * @test
     */
    public function testDeleteInscription()
    {
        $fakeTourny = factory(Tournaments::class,1)->create([
            'id' => 9999,
            'num_participantes_max' => 90
        ]);
        Tournaments::signUpForATournament($fakeTourny[0]->id,30,50);
        $this->assertDatabaseHas('reserva_tournament',[
            'id_tournament' => 9999,
            'id_usuario' => 50,
            'num_inscripciones' => 30
        ]);
        $inscriptionId = DB::table('reserva_tournament')
            ->where('id_tournament',9999)
            ->where('id_usuario',50)
            ->where('num_inscripciones',30)
            ->get();
        $inscriptionId = $inscriptionId[0]->id;
        Tournaments::deleteInscription($inscriptionId);
        $this->assertDatabaseMissing('reserva_tournament',[
            'id' => 1,
            'id_usuario' => 50,
            'id_tournament' => 9999,
            'num_inscripciones' => 30
        ]);
    }

    /**
     *
     *
     * @test
     */
    public function testDecrementParticipantsInATournament()
    {
        $fakeTourny = factory(Tournaments::class,1)->create([
            'id' => 999,
            'num_participantes_max' => 90,
            'num_participantes_actual' => 90
        ]);
        Tournaments::decrementParticipantsInATournament($fakeTourny[0]->id,30);
        $this->assertDatabaseHas('tournaments',[
            'id' => 999,
            'num_participantes_actual' => 60
        ]);
    }
}
