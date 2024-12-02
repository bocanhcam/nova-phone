<?php

namespace Bocanhcam\NovaPhone;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\SupportsDependentFields;

class Phone extends Field
{
    use SupportsDependentFields;

    const DEFAULT_COUNTRY = 'US';

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'phone';

    public function country(string $country = self::DEFAULT_COUNTRY): Phone
    {
        return $this->withMeta(['country' => $country]);
    }

    public function international(): Phone
    {
        return $this->withMeta(['international' => true]);
    }

    public function jsonSerialize(): array
    {
        if (!isset($this->meta['country'])) {
            $this->withMeta(['country' => self::DEFAULT_COUNTRY]);
        }

        return parent::jsonSerialize();
    }
}
