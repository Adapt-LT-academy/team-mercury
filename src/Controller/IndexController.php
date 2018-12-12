<?php
/**
 * Created by PhpStorm.
 * User: indre
 * Date: 18.11.7
 * Time: 18.32
 */
namespace App\Controller;
use App\Service\RoomOrderConversation;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\SymfonyCache;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Middleware\ApiAi;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\DatabaseService;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use App\Traits\ContainerAwareConversationTrait;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;
class IndexController extends Controller
{
    use ContainerAwareConversationTrait;
    /**
     * @Route(path="/", methods={"GET"}, name="botmanChat")
     */
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }
    /**
     * @Route(path="/chat", methods={"GET"}, name="botman")
     */
    public function botMan()
    {
        return $this->render('botman.html.twig');
    }
    /**
     * @Route("/message", name="message")
     */
    function messageAction()
    {
        $this->converstionObj = new RoomOrderConversation();
        // Create a BotMan instance, using the WebDriver
        DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
        $adapter = new FilesystemAdapter();
        $botman = BotManFactory::create([], new SymfonyCache($adapter)); //No config options required
        //Setup DialogFlow middleware
        $dialogflow = ApiAi::create('s0meRand0mT0ken')->listenForAction();
        $botman->middleware->received($dialogflow);
        // Give the bot some things to listen for.
        $botman->hears(
            '(hello|hi|hey)',
            function (BotMan $bot) {
                $bot->startConversation(new RoomOrderConversation());
            }
        );
        $botman->userStorage();
        $botman->hears(
            'stop',
            function (BotMan $bot) {
                $bot->reply('stopped');
            }
        )->stopsConversation();
        // Start listening
        $botman->listen();
        //Send an empty response (Botman has already sent the output itself - https://github.com/botman/botman/issues/342)
        return new Response();
    }
}