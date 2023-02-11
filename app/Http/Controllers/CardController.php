<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Models\Card;
use App\Models\MediaOwner;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function saveCard(StoreCardRequest $request, $userId)
    {
        $card = Card::create([
            'media_owner_id' => $userId,
            'name_on_card' => $request['payment-card-owner-name'],
            'number' => $request['payment-card-number'],
            'expires' => $request['payment-card-expire-date'],
            'CVC' => $request['payment-card-cvc'],
            'is_primary' => count(MediaOwner::find($userId)->cards) == 0
        ]);
        return redirect()->back();
    }

    public function deleteCard(Request $request, $cardId)
    {
        if ($request['delete_card'] == 'yes') {
            $card = Card::find($cardId)->delete();
        }
        return redirect()->back();
    }

    public function makeCardPrimary(Request $request, $cardId)
    {
        if ($request['make_card_primary'] == 'yes') {
            foreach (auth()->user()->cards as $card) {
                if ($card->id == $cardId) {
                    $card->is_primary = true;
                } else {
                    $card->is_primary = false;
                }
                $card->save();
            }
        }
        return redirect()->back();
    }

}
