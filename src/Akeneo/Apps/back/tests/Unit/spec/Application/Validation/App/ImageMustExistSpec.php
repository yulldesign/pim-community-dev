<?php
declare(strict_types=1);

namespace spec\Akeneo\Apps\Application\Validation\App;

use Akeneo\Apps\Application\Validation\App\ImageMustExist;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Validator\Constraint;

class ImageMustExistSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ImageMustExist::class);
    }

    public function it_is_a_constraint(): void
    {
        $this->shouldHaveType(Constraint::class);
    }

    public function it_provides_a_target(): void
    {
        $this->getTargets()->shouldReturn(ImageMustExist::PROPERTY_CONSTRAINT);
    }

    public function it_provides_a_tag_to_be_validated(): void
    {
        $this->validatedBy()->shouldReturn('apps_image_must_exist');
    }
}
