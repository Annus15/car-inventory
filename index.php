<?php
    include('connection.php');
    include('header.php');
$arrays = ["mic.com","mobygames.com","wnd.com","top5.com","challonge.com","studentdoctor.net","investing.com","nydailynews.com","ninjajournalist.com","playstationtrophies.org","pogo.com","planetminecraft.com","outkick.com","vocabulary.com","hypegalore.com","hooch.net","triviatoday.com","investors.com","singular-one.com","thelist.com","thenextweb.com","homeworklib.com","gfinity.net","hollywood.com","reviewed.com","teaching.com","ask.com","tinybeans.com","spareroom.co","blockshopper.com","agame.com","bodybuilding.com","grizly.com","akc.org","dotesports.com","iaai.com","names.org","moomoo.io","nationalgeographic.com","mylife.com","myfantasyleague.com","beforeitsnews.com","cinemablend.com","me.me","mapquest.com","makeuseof.com","lingq.com","littlethings.com","timeout.com","leafly.com","luckyvitamin.com","mydramalist.com","muthead.com","gw2efficiency.com","keenspot.com","comicbookmovie.com","mtggoldfish.com","typingclub.com","barchart.com","dailystar.co.uk","oyster.com","retailmenot.com","onlyinyourstate.com","nationstates.net","sparkpeople.com","rebrickable.com","mirror.co.uk","sportslogos.net","speedrun.com","styleforum.net","theculturetrip.com","theblaze.com","rocket-league.com","scrabblewordfinder.org","statnews.com","bkstr.com","skyscraperpage.com","smarter.com","shacknews.com","stylecaster.com","fleaflicker.com","typeracer.com","zeldadungeon.net","sandrarose.com","poki.com","investmentguru.com","cardgames.io","lovetoknow.com","spriters-resource.com","rumble.com","raider.io","carsdirect.com","koreaboo.com","local.com","blizzard.com","wikileaf.com","whatcar.com","addictivetips.com","whatsmyipadress.com","crushthat.com","nextshark.com","refinery29.com","eightieskids.com","buzzfeed.com","weforum.org","typing.com","mentertained.com","howtogeek.com","freeforums.net","classmates.com","autoblog.com","lifehacker.com","parade.com","wordfind.com","theinfatuation.com","inboxdollars.com","medicinenet.com","democracynow.org","carcarekiosk.com","jalopnik.com","jigidi.com","hollywoodlife.com","goodrx.com","homedit.com","har.com","factcheck.org","gamesradar.com","calculator.net","hypebeast.com","rent.com","xe.com","rollingout.com","peekyou.com","whowhatwear.com","whatculture.com","worldofsolitaire.com","wine-searcher.com","rpgsite.net","cpr.org","wtatennis.com","daily-choices.com","surivornet.com","gamebanana.com","wordhelp.com","venturebeat.com","pudding.cool","thegamer.com","classicdriver.com","justwatch.com","racer.com","keybr.com","newsmax.com","binance.us","dumbingofage.com","egscomics.com","travian.co.uk","gamerescape.com","flightrising.com","money.com","mod-network.com","doordash.com","wrestlingheadlines.com","reference.com","megagames.com","checkmategaming.com","krunker.io","12tomatoes.com","camelcamelcamel.com","mymodernmet.com","freekibble.com","powerthesaurus.org","robbreport.com","yourdailydish.com","bestofsenior.com","findanyanswer.com","macworld.co.uk","ratemyprofessors.com","smithsonianmag.com","gazillions.com","justfly.com","songsterr.com","everyjobforme.com","musicca.com","gradesaver.com","teamsnap.com","timesofisrael.com","dictionary.com","thesaurus.com","ranker.com","puppyfinder.com","lipstickalley.com","law.com","49erswebzone.com","dailytimewaste.com","flightsearchdirect.com","bradsdeals.com","1001freefonts.com","start.me","gumtree.com","brickseek.com","time.is","gamejolt.com","bestreviews.com","gaiaonline.com","enotes.com","healthgrades.com","firstshowing.net","shefinds.com","comingsoon.net","whatismyipaddress.com","hotnewhiphop.com","perezhilton.com","doodle.com","drivetribe.com","nhl.com","whoeasy.com","bethesda.net","photopea.com","q.digital","lifeexact.com","warframe.com","hoopsrumors.com","trip.com","allbud.com","worldometers.info","nitrotype.com","hola.com","flightsim.to","aljazeera.net","therighthairstyles.com","thecrazytourist.com","ragingbull.com","homes.com","thecinemaholic.com","petcurious.com","livingly.com","magicfind.us"];

echo "<pre>";
print_r(implode(',',$arrays));
echo "</pre>";
exit();
    $getMakes = getMakes();
    $searchStockData = array();
    if (isset($_POST['searchStock'])) {
        $searchStockData = $_POST;
    }
    $searchStock = searchStock($searchStockData);


?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-1">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Search Stock</h4>
            </div>
            <!-- /.card-header -->
            <form method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-2">
                            <div class="form-group">
                                <label>Make</label>
                                <select class="form-control select2 stock_make" name="stock_make" id="make_id" style="width: 100%;">
                                    <option selected="selected" value="">Select Make</option>
                                    <?php foreach ($getMakes as $key => $make) {   ?>
                                        <option value="<?= $make['id'] ?>"><?= $make['make_title'] ?></option>
                                    <?php    } ?>
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Model</label>
                                <select class="form-control select2 stock_model" name="stock_model" id="model_id" style="width: 100%;">
                                    <option selected="selected" value="">Select Model</option>
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                    <!-- /.card-body -->
                <div class="card-footer text-center">
                    <button type="submit" name="searchStock" class="btn btn-md btn-primary search-btn">
                        <span class="spinner-border spinner-border-sm search-spinner d-none" role="status" aria-hidden="true"></span>
                        <i class="fa fa-search search-icon"></i>&nbsp;&nbsp;Search
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-1">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Stock List</h4>
            </div>
            <div class="card-body">

                <div class="table-responsive">

                    <table id="table-stock" class="table table-striped table-hover va-middle text-center">

                        <thead>
                            <tr>

                                <th>S.No.</th>
                                <th>Stock ID</th>
                                <th>Stock Title</th>
                                <th>Stock Make</th>
                                <th>Stock Model</th>
                                <th>Stock Trim</th>
                                <th>Year</th>
                                <th>Actions</th>

                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            if (!empty($searchStock)) {
                                $i = 1;
                                foreach ($searchStock as $key => $stock) {   ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td>STK-00<?= $stock['id'] ?></td>
                                    <td><?= $stock['stock_title'] ?></td>
                                    <td><?= $stock['make_title'] ?></td>
                                    <td><?= $stock['model_title'] ?></td>
                                    <td><?= $stock['trim_title'] ?></td>
                                    <td><?= $stock['year'] ?></td>
                                    <td class="align-middle">
                                        <div class="btn-group">
                                            <a class="btn btn-info" href="view.php?stock_id=<?= $stock['id'] ?>"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary" href="stock.php?update=<?= $stock['id'] ?>"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger" href="delete.php?stock_id=<?= $stock['id'] ?>"><i class="fa fa-trash"></i></a>
                                        </div>              
                                    </td>
                                </tr>
                            <?php
                                $i++;
                                }  
                            }
                            else{ ?>
                                <tr>
                                    <td colspan="8"><strong>No Records Found</strong></td>
                                </tr>
                        <?php    }
                        ?>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>
   
<?php
    include('footer.php');
?>

