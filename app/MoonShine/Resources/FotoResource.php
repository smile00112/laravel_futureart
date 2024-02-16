<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Foto;

use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\Url;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<Foto>
 */
class FotoResource extends ModelResource
{
    protected string $model = Foto::class;

    protected string $title = 'Фотографии';

    public function fields(): array
    {

        return [
            Block::make([

                ID::make()->sortable(),

                Text::make('Заголовок', 'title')
                    ->required(),

                Slug::make('Slug', 'slug')
                    ->from('title')
                    ->unique()
                    ->separator('-')
                    ->hideOnIndex(),


                Url::make('qr')
                    ->hint('Url') //'/qr-code/' . $this->item->album->slug . '/' . $this->item->slug
                    ->link( function(){
                        return
                            $this->item && $this->item->album
                                ?
                            '/qr-code/' . $this->item->album->slug . '/' . $this->item->slug
                                :
                            '#';
                    } , 'qr-code', blank: true)
                    ->expansion('url')
                    ->hideOnForm(),

                Image::make('Фото', 'thumbnail')
                    ->removable()
                    ->disk('public')
                    ->dir('photo'),

                Switcher::make('Вкл/Выкл', 'status')->default(true),

                BelongsTo::make('Альбом', 'album')
                    //->asyncSearch()
                    ->hideOnIndex(),

            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
