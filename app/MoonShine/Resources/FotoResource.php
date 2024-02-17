<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Foto;

use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Field;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\Url;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
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
            Grid::make([
                Column::make([
                    Block::make([

                    ID::make()->sortable(),

                    Text::make('Заголовок', 'title')
                        ->required(),

                    Slug::make('Slug', 'slug')
                        ->from('title')
                        ->unique()
                        ->separator('-')
                        ->hideOnIndex(),

                    Url::make('Ссылка', 'qr-code-link')
                        ->link('', name:'qr-code', blank: true)
                        ->copy(),

                    Image::make('Фото', 'thumbnail')
                        ->removable()
                        ->disk('public')
                        ->dir('photo'),

                    Switcher::make('Вкл/Выкл', 'status')
                        ->updateOnPreview()
                        ->default(true),

                    BelongsTo::make('Альбом', 'album')
                        //->asyncSearch()
                        ->hideOnIndex(),

                ]),
               ])->columnSpan(6),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    public function import(): ?ImportHandler
    {
        return null;
    }
    public function export(): ?ExportHandler
    {
        return null;
    }
}
