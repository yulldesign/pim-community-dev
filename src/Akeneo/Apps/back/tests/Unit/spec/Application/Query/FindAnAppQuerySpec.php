<?php

declare(strict_types=1);

namespace spec\Akeneo\Apps\Application\Query;

use Akeneo\Apps\Application\Query\FindAnAppQuery;
use PhpSpec\ObjectBehavior;

/**
 * @author Romain Monceau <romain@akeneo.com>
 * @copyright 2019 Akeneo SAS (http://www.akeneo.com)
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
class FindAnAppQuerySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('bynder');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(FindAnAppQuery::class);
    }

    public function it_returns_an_application_code()
    {
        $this->appCode()->shouldReturn('bynder');
    }
}
