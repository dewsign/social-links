<?php

namespace Dewsign\SocialLinks\Nova;

use Laravel\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Timothyasp\Color\Color;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use Dewsign\NovaRepeaterBlocks\Models\Repeater;

class SocialLink extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'Dewsign\SocialLinks\SocialLink';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    public static $displayInNavigation = false;

    // public static $displayInNavigation = false;

    public static function label()
    {
        return __('Social Link');
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        $options = array_merge(
            Repeater::customTemplates(__DIR__ . '/../Resources/views/social-links'),
            Repeater::customTemplates(resource_path('/views/vendor/social-links'))
        );

        return [
            ID::make()->sortable(),
            Select::make('Icon')
                ->options($options)
                ->displayUsingLabels()
                ->hideFromIndex(),
            Text::make('Profile Link', 'link'),
            Color::make('Icon Colour'),
        ];
    }
}
