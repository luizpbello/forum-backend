import { Link } from "@inertiajs/react";

export default function TopicCard( topic ) {
    const commentCount = topic.topic.comment.length;

    return (
        <Link href={route("topic.show", { id: topic.topic.id })}>
            <div className="bg-white rounded-lg shadow-md p-4 mb-4 hover:scale-105 cursor-pointer">
                <h2 className="text-xl font-bold mb-2">{topic.topic.title}</h2>
                <p className="text-gray-800">{topic.topic.content}</p>
                <div className="mt-4">
                    {commentCount > 0 ? (
                        <span className="px-2 py-1 bg-gray-200 rounded-md text-gray-800 text-sm">
                            {commentCount}{" "}
                            {commentCount === 1 ? "comentário" : "comentários"}
                        </span>
                    ) : (
                        <span className="px-2 py-1 bg-gray-200 rounded-md text-gray-800 text-sm">0 comentário</span>
                    )}
                </div>
            </div>
        </Link>
    );
}
