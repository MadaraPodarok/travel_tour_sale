<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
//    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id', 'users_id', 'additional_visa', 'transaction_total', 'transaction_status'
    ];

    // Маппинг строковых значений в числовые статусы
    public const STATUS_MAP = [
        'IN_CART' => 0,
        'PENDING' => 1,
        'SUCCESS' => 2,
        'CANCEL' => 3,
        'FAILED' => 4,
    ];

    public const STATUS_TEXT_RU = [
        'IN_CART' => 'В корзине',
        'PENDING' => 'В ожидании',
        'SUCCESS' => 'Успешно',
        'CANCEL' => 'Отменено',
        'FAILED' => 'Неуспешно',
    ];

    // Мутатор для установки числового значения статуса в базе данных
    public function setTransactionStatusAttribute($value)
    {
        $this->attributes['transaction_status'] = self::STATUS_MAP[$value] ?? null;
    }

    // Добавьте метод для преобразования статуса в текст
    public function getStatusTextAttribute(): string
    {
        $statusMapFlipped = array_flip(self::STATUS_MAP);
        $statusKey = $statusMapFlipped[$this->transaction_status] ?? 'UNKNOWN';

        // Получаем текст на русском из STATUS_TEXT_RU
        return self::STATUS_TEXT_RU[$statusKey] ?? 'Неизвестно';
    }

    protected $hidden = [

    ];

    public function Details(): HasMany
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }

    public function Travel_Package(): BelongsTo
    {
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
