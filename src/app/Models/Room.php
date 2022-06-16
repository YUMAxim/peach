<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Recruit;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Room extends Model
{
    protected $fillable = [
        'id',
        'first_user_id',
        'second_user_id',
        // 'partner'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function latestMessage(): HasOne
    {
        return $this->hasOne(Message::class)->latest();
    }

    public function histories()
    {
        return $this->where(function ($q) {
            $q->where('first_user_id', auth()->id());
            $q->orWhere('second_user_id', auth()->id());
        })->with('latestMessage')->get();
    }

    public function partner()
    {
        $this->partner = '';

        $partnerFirstUserId = $this->where(function ($q) {
            $q->where('id', $this->id);
            $q->where('first_user_id', '<>', auth()->id());
        })->get('first_user_id');
        if (isset($partnerFirstUserId[0])) {
            $this->partner = User::where('id', $partnerFirstUserId[0]->first_user_id)->get()[0];
        }

        $partnerSecondUserId = $this->where(function ($q) {
            $q->where('id', $this->id);
            $q->where('second_user_id', '<>', auth()->id());
        })->get('second_user_id');
        if (isset($partnerSecondUserId[0])) {
            $this->partner = User::where('id', $partnerSecondUserId[0]->second_user_id)->get()[0];
        }
        // dd($partnerSecondUserId, $partnerSecondUserId[0]->second_user_id, $this->partner);
        // dd($partnerSecondUserId);
    }

    public function setRoomId($id)
    {
        $rooms = $this::get();
        $userIdList = ['toUserId' => $id, 'fromUserId' => auth()->id()];
        $firstUserId = min($userIdList);
        $secondUserId = max($userIdList);
        $userIdSet = ['first_user_id' => $firstUserId, 'second_user_id' => $secondUserId];
        $room = '';

        foreach ($rooms as $room) {
            $room = $room->where(function ($q) use ($firstUserId, $secondUserId) {
                $q->where('first_user_id', $firstUserId);
                $q->where('second_user_id', $secondUserId);
            })->first();
        }
        // dd($rooms, $room, $userIdSet);
        if (isset($room->id)) {
            echo "id exits";
            $roomId = $room->id;
        } else {
            echo "no id, let me create it.....";
            $room = new Room;
            $room->create($userIdSet);
            echo "room id just set, please reload";
            $roomId = 666;
        };
        // dump($roomId);

        return $roomId;
    }

    public function partnerUserId()
    {
        // dd($this);
        if ($this->first_user_id !== auth()->id()) {
            return $this->first_user_id;
        } else {
            return $this->second_user_id;
        }

    }
}
