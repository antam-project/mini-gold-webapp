<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Master\MasterGold;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Error;
use Weidner\Goutte\GoutteFacade;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $url = 'https://www.logammulia.com/id/harga-emas-hari-ini';

            $crawler = GoutteFacade::request('GET', $url);

    //        /html/body/section[3]/div/div[3]/table[1]/tbody/tr[3]/td[2]
            $hargaDasar = [
                '0.5' => null,
                '1' => null,
                '2' => null,
                '3' => null,
                '5' => null,
                '10' => null,
                '25' => null,
                '50' => null,
                '100' => null,
                '250' => null,
                '500' => null,
                '1000' => null,
            ];

            $hargaDasar['0.5'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(2)->filter('td')->eq(1)->text()));

            $hargaDasar['1'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(3)->filter('td')->eq(1)->text()));

            $hargaDasar['2'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(4)->filter('td')->eq(1)->text()));

            $hargaDasar['3'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(5)->filter('td')->eq(1)->text()));

            $hargaDasar['5'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(6)->filter('td')->eq(1)->text()));

            $hargaDasar['10'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(7)->filter('td')->eq(1)->text()));

            $hargaDasar['25'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(8)->filter('td')->eq(1)->text()));

            $hargaDasar['50'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(9)->filter('td')->eq(1)->text()));

            $hargaDasar['100'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(10)->filter('td')->eq(1)->text()));

            $hargaDasar['250'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(11)->filter('td')->eq(1)->text()));

            $hargaDasar['500'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(12)->filter('td')->eq(1)->text()));

            $hargaDasar['1000'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(13)->filter('td')->eq(1)->text()));

            $hargaNPWP = [
                '0.5' => null,
                '1' => null,
                '2' => null,
                '3' => null,
                '5' => null,
                '10' => null,
                '25' => null,
                '50' => null,
                '100' => null,
                '250' => null,
                '500' => null,
                '1000' => null,
            ];

            $hargaNPWP['0.5'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(2)->filter('td')->eq(2)->text()));

            $hargaNPWP['1'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(3)->filter('td')->eq(2)->text()));

            $hargaNPWP['2'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(4)->filter('td')->eq(2)->text()));

            $hargaNPWP['3'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(5)->filter('td')->eq(2)->text()));

            $hargaNPWP['5'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(6)->filter('td')->eq(2)->text()));

            $hargaNPWP['10'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(7)->filter('td')->eq(2)->text()));

            $hargaNPWP['25'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(8)->filter('td')->eq(2)->text()));

            $hargaNPWP['50'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(9)->filter('td')->eq(2)->text()));

            $hargaNPWP['100'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(10)->filter('td')->eq(2)->text()));

            $hargaNPWP['250'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(11)->filter('td')->eq(2)->text()));

            $hargaNPWP['500'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(12)->filter('td')->eq(2)->text()));

            $hargaNPWP['1000'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(13)->filter('td')->eq(2)->text()));

            $hargaNonNPWP = [
                '0.5' => null,
                '1' => null,
                '2' => null,
                '3' => null,
                '5' => null,
                '10' => null,
                '25' => null,
                '50' => null,
                '100' => null,
                '250' => null,
                '500' => null,
                '1000' => null,
            ];

            $hargaNonNPWP['0.5'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(2)->filter('td')->eq(3)->text()));

            $hargaNonNPWP['1'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(3)->filter('td')->eq(3)->text()));

            $hargaNonNPWP['2'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(4)->filter('td')->eq(3)->text()));

            $hargaNonNPWP['3'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(5)->filter('td')->eq(3)->text()));

            $hargaNonNPWP['5'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(6)->filter('td')->eq(3)->text()));

            $hargaNonNPWP['10'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(7)->filter('td')->eq(3)->text()));

            $hargaNonNPWP['25'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(8)->filter('td')->eq(3)->text()));

            $hargaNonNPWP['50'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(9)->filter('td')->eq(3)->text()));

            $hargaNonNPWP['100'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(10)->filter('td')->eq(3)->text()));

            $hargaNonNPWP['250'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(11)->filter('td')->eq(3)->text()));

            $hargaNonNPWP['500'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(12)->filter('td')->eq(3)->text()));

            $hargaNonNPWP['1000'] = floatval(str_replace(',', '', $crawler->filter('html body section')->eq(2)->filter('div .row')->eq(0)
                ->filter('table')->eq(0)->filter('tr')->eq(13)->filter('td')->eq(3)->text()));

            $currentDate = date('Y-m-d');

            $weight = [
                '0.5',
                '1',
                '2',
                '3',
                '5',
                '10',
                '25',
                '50',
                '100',
                '250',
                '500',
                '1000',
            ];

            $source = 'www.logammulia.com/id';

            try {
                DB::beginTransaction();
                for ($i = 0; $i < count($weight); $i++) {
                    MasterGold::create([
                        'date' => $currentDate,
                        'weight' => $weight[$i],
                        'price1' => $hargaDasar[$weight[$i]],
                        'price2' => $hargaNPWP[$weight[$i]],
                        'price3' => $hargaNonNPWP[$weight[$i]],
                        'source' => $source
                    ]);
                }
                DB::commit();
            } catch (Error $e) {

            }
        })->dailyAt('08:30');
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
